<?php
/**
 * Load a PaySynk print product from the hosted shop preview.
 * The public embed API hides the catalogue until Stripe is activated;
 * the hosted product page still returns the configurator payload.
 */

function paysynk_remote_product($slug) {
  static $memo = [];
  $slug = strtolower(trim((string) $slug));
  if ($slug === '') {
    return null;
  }
  if (array_key_exists($slug, $memo)) {
    return $memo[$slug];
  }

  $cache_file = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'pb-paysynk-' . preg_replace('/[^a-z0-9\-]/', '', $slug) . '.json';
  if (is_file($cache_file) && (time() - filemtime($cache_file)) < 120) {
    $cached = json_decode((string) file_get_contents($cache_file), true);
    if (is_array($cached) && !empty($cached['product']['slug'])) {
      return $memo[$slug] = $cached;
    }
  }

  $path = '/s/' . rawurlencode(PAYSYNK_STORE) . '/p/' . rawurlencode($slug);
  $url = PAYSYNK_ORIGIN . $path;
  $body = paysynk_http_get($url, [
    'RSC: 1',
    'Next-Url: ' . $path,
    'Accept: text/x-component',
    'User-Agent: PaperboyJA-shop/1.0',
  ]);
  $parsed = $body ? paysynk_parse_rsc_product($body) : null;
  if ($parsed) {
    @file_put_contents($cache_file, json_encode($parsed));
  }
  return $memo[$slug] = $parsed;
}

function paysynk_http_get($url, array $headers = []) {
  if (function_exists('curl_init')) {
    $ch = curl_init($url);
    curl_setopt_array($ch, [
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_TIMEOUT => 8,
      CURLOPT_HTTPHEADER => $headers,
    ]);
    $body = curl_exec($ch);
    $code = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return ($body !== false && $code >= 200 && $code < 400) ? $body : '';
  }

  $header_str = '';
  foreach ($headers as $h) {
    $header_str .= $h . "\r\n";
  }
  $ctx = stream_context_create([
    'http' => [
      'method' => 'GET',
      'header' => $header_str,
      'timeout' => 8,
      'ignore_errors' => true,
    ],
  ]);
  $body = @file_get_contents($url, false, $ctx);
  return $body === false ? '' : $body;
}

function paysynk_parse_rsc_product($body) {
  $pos = strpos($body, '{"store":{');
  if ($pos === false) {
    $pos = strpos($body, '{"product":{');
  }
  if ($pos === false) {
    return null;
  }

  $json = paysynk_extract_json_object(substr($body, $pos));
  if ($json === '') {
    return null;
  }

  $json = preg_replace('/"\$D([^"]+)"/', '"$1"', $json);
  $json = preg_replace('/"\$[0-9]+:[^"]+"/', 'null', $json);
  $data = json_decode($json, true);
  if (!is_array($data)) {
    return null;
  }

  $product = $data['product'] ?? null;
  if (!is_array($product) || empty($product['slug'])) {
    return null;
  }

  return [
    'store' => $data['store'] ?? ['slug' => PAYSYNK_STORE, 'currency' => 'gbp', 'paymentsActive' => false],
    'product' => $product,
  ];
}

function paysynk_extract_json_object($text) {
  $len = strlen($text);
  $depth = 0;
  $in_str = false;
  $esc = false;
  for ($i = 0; $i < $len; $i++) {
    $ch = $text[$i];
    if ($in_str) {
      if ($esc) {
        $esc = false;
      } elseif ($ch === '\\') {
        $esc = true;
      } elseif ($ch === '"') {
        $in_str = false;
      }
      continue;
    }
    if ($ch === '"') {
      $in_str = true;
      continue;
    }
    if ($ch === '{') {
      $depth++;
    } elseif ($ch === '}') {
      $depth--;
      if ($depth === 0) {
        return substr($text, 0, $i + 1);
      }
    }
  }
  return '';
}

function paysynk_format_money($minor, $currency = 'gbp') {
  $amount = ((int) $minor) / 100;
  $currency = strtolower((string) $currency);
  $symbols = ['gbp' => '£', 'usd' => '$', 'eur' => '€', 'jmd' => 'J$'];
  $symbol = $symbols[$currency] ?? strtoupper($currency) . ' ';
  if (abs($amount - round($amount)) < 0.001) {
    return $symbol . number_format($amount, 0);
  }
  return $symbol . number_format($amount, 2);
}

function paysynk_product_image($product, $fallback = '') {
  if (!empty($product['images'][0]) && is_string($product['images'][0])) {
    return $product['images'][0];
  }
  return $fallback;
}

function paysynk_related_products($product) {
  $items = [];
  $seen = [];
  $rows = $product['relatedFrom'] ?? [];
  usort($rows, function ($a, $b) {
    return ((int) ($a['sort'] ?? 0)) <=> ((int) ($b['sort'] ?? 0));
  });
  foreach ($rows as $row) {
    $to = is_array($row['to'] ?? null) ? $row['to'] : $row;
    $slug = strtolower((string) ($to['slug'] ?? ''));
    if ($slug === '' || isset($seen[$slug])) {
      continue;
    }
    $seen[$slug] = true;
    $local = paysynk_product_by_slug($slug);
    $image = '';
    if (!empty($to['images'][0]) && is_string($to['images'][0])) {
      $image = $to['images'][0];
    } elseif (!empty($local['image'])) {
      $image = $local['image'];
    }
    $items[] = [
      'slug' => $slug,
      'title' => $to['title'] ?? ($local['name'] ?? $slug),
      'image' => $image,
    ];
  }
  if (!$items) {
    foreach (($product['related'] ?? []) as $rel) {
      $slug = strtolower((string) ($rel['slug'] ?? ''));
      if ($slug === '' || isset($seen[$slug])) {
        continue;
      }
      $seen[$slug] = true;
      $local = paysynk_product_by_slug($slug);
      $image = '';
      if (!empty($rel['images'][0]) && is_string($rel['images'][0])) {
        $image = $rel['images'][0];
      } elseif (!empty($local['image'])) {
        $image = $local['image'];
      }
      $items[] = [
        'slug' => $slug,
        'title' => $rel['title'] ?? ($local['name'] ?? $slug),
        'image' => $image,
      ];
    }
  }
  return $items;
}

function paysynk_starting_price_minor($product) {
  $vars = $product['variations'] ?? [];
  $min = null;
  foreach ($vars as $variation) {
    if (!isset($variation['priceMinor'])) {
      continue;
    }
    $price = (int) $variation['priceMinor'];
    if ($min === null || $price < $min) {
      $min = $price;
    }
  }
  if ($min !== null) {
    return $min;
  }
  return (int) ($product['basePriceMinor'] ?? 0);
}
