<?php
/**
 * Shop currencies and owner-set exchange rates.
 * Rates mean: 1 unit of that currency = N Jamaican dollars.
 */

function paperboy_currency_catalog() {
  return [
    'jmd' => ['code' => 'JMD', 'name' => 'Jamaican Dollar', 'symbol' => 'J$', 'decimals' => 2],
    'usd' => ['code' => 'USD', 'name' => 'US Dollar', 'symbol' => 'US$', 'decimals' => 2],
    'eur' => ['code' => 'EUR', 'name' => 'Euro', 'symbol' => '€', 'decimals' => 2],
    'gbp' => ['code' => 'GBP', 'name' => 'British Pound', 'symbol' => '£', 'decimals' => 2],
    'cad' => ['code' => 'CAD', 'name' => 'Canadian Dollar', 'symbol' => 'CA$', 'decimals' => 2],
    'aud' => ['code' => 'AUD', 'name' => 'Australian Dollar', 'symbol' => 'AU$', 'decimals' => 2],
    'nzd' => ['code' => 'NZD', 'name' => 'New Zealand Dollar', 'symbol' => 'NZ$', 'decimals' => 2],
    'chf' => ['code' => 'CHF', 'name' => 'Swiss Franc', 'symbol' => 'CHF ', 'decimals' => 2],
    'jpy' => ['code' => 'JPY', 'name' => 'Japanese Yen', 'symbol' => '¥', 'decimals' => 0],
    'cny' => ['code' => 'CNY', 'name' => 'Chinese Yuan', 'symbol' => 'CN¥', 'decimals' => 2],
    'hkd' => ['code' => 'HKD', 'name' => 'Hong Kong Dollar', 'symbol' => 'HK$', 'decimals' => 2],
    'sgd' => ['code' => 'SGD', 'name' => 'Singapore Dollar', 'symbol' => 'S$', 'decimals' => 2],
    'inr' => ['code' => 'INR', 'name' => 'Indian Rupee', 'symbol' => '₹', 'decimals' => 2],
    'mxn' => ['code' => 'MXN', 'name' => 'Mexican Peso', 'symbol' => 'MX$', 'decimals' => 2],
    'brl' => ['code' => 'BRL', 'name' => 'Brazilian Real', 'symbol' => 'R$', 'decimals' => 2],
    'zar' => ['code' => 'ZAR', 'name' => 'South African Rand', 'symbol' => 'R', 'decimals' => 2],
    'sek' => ['code' => 'SEK', 'name' => 'Swedish Krona', 'symbol' => 'SEK ', 'decimals' => 2],
    'nok' => ['code' => 'NOK', 'name' => 'Norwegian Krone', 'symbol' => 'NOK ', 'decimals' => 2],
    'dkk' => ['code' => 'DKK', 'name' => 'Danish Krone', 'symbol' => 'DKK ', 'decimals' => 2],
    'pln' => ['code' => 'PLN', 'name' => 'Polish Zloty', 'symbol' => 'zł', 'decimals' => 2],
    'aed' => ['code' => 'AED', 'name' => 'UAE Dirham', 'symbol' => 'AED ', 'decimals' => 2],
    'twd' => ['code' => 'TWD', 'name' => 'Taiwan Dollar', 'symbol' => 'NT$', 'decimals' => 2],
    'krw' => ['code' => 'KRW', 'name' => 'South Korean Won', 'symbol' => '₩', 'decimals' => 0],
    'ttd' => ['code' => 'TTD', 'name' => 'Trinidad & Tobago Dollar', 'symbol' => 'TT$', 'decimals' => 2],
    'bbd' => ['code' => 'BBD', 'name' => 'Barbados Dollar', 'symbol' => 'Bds$', 'decimals' => 2],
    'xcd' => ['code' => 'XCD', 'name' => 'East Caribbean Dollar', 'symbol' => 'EC$', 'decimals' => 2],
    'kyd' => ['code' => 'KYD', 'name' => 'Cayman Islands Dollar', 'symbol' => 'CI$', 'decimals' => 2],
  ];
}

function paperboy_country_currency_map() {
  $euro = ['AT', 'BE', 'CY', 'EE', 'FI', 'FR', 'DE', 'GR', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PT', 'SK', 'SI', 'ES', 'AD', 'MC', 'SM', 'VA', 'ME'];
  $xcd = ['AG', 'DM', 'GD', 'KN', 'LC', 'VC', 'AI', 'MS'];
  $map = [
    'JM' => 'jmd',
    'US' => 'usd', 'PR' => 'usd', 'GU' => 'usd', 'AS' => 'usd', 'MP' => 'usd', 'VI' => 'usd',
    'GB' => 'gbp', 'IM' => 'gbp', 'JE' => 'gbp', 'GG' => 'gbp',
    'CA' => 'cad',
    'AU' => 'aud', 'CX' => 'aud', 'CC' => 'aud', 'NF' => 'aud',
    'NZ' => 'nzd', 'CK' => 'nzd', 'NU' => 'nzd', 'PN' => 'nzd', 'TK' => 'nzd',
    'CH' => 'chf', 'LI' => 'chf',
    'JP' => 'jpy',
    'CN' => 'cny',
    'HK' => 'hkd',
    'SG' => 'sgd',
    'IN' => 'inr',
    'MX' => 'mxn',
    'BR' => 'brl',
    'ZA' => 'zar',
    'SE' => 'sek',
    'NO' => 'nok',
    'DK' => 'dkk', 'FO' => 'dkk', 'GL' => 'dkk',
    'PL' => 'pln',
    'AE' => 'aed',
    'TW' => 'twd',
    'KR' => 'krw',
    'TT' => 'ttd',
    'BB' => 'bbd',
    'KY' => 'kyd',
  ];
  foreach ($euro as $cc) {
    $map[$cc] = 'eur';
  }
  foreach ($xcd as $cc) {
    $map[$cc] = 'xcd';
  }
  return $map;
}

function paperboy_language_currency_map() {
  return [
    'de' => 'eur', 'fr' => 'eur', 'es' => 'eur', 'it' => 'eur', 'nl' => 'eur',
    'pt' => 'eur', 'fi' => 'eur', 'el' => 'eur', 'ga' => 'eur', 'sk' => 'eur',
    'sl' => 'eur', 'et' => 'eur', 'lv' => 'eur', 'lt' => 'eur',
    'ja' => 'jpy', 'zh' => 'cny', 'hi' => 'inr', 'sv' => 'sek', 'nb' => 'nok',
    'nn' => 'nok', 'da' => 'dkk', 'pl' => 'pln', 'ko' => 'krw', 'ar' => 'aed',
  ];
}

function paperboy_visitor_geo() {
  static $cached = null;
  if ($cached !== null) {
    return $cached;
  }

  $country = '';
  $source = 'fallback';
  $headers = [
    'HTTP_CF_IPCOUNTRY',
    'HTTP_CLOUDFRONT_VIEWER_COUNTRY',
    'HTTP_X_APPENGINE_COUNTRY',
    'HTTP_X_COUNTRY_CODE',
    'HTTP_X_VERCEL_IP_COUNTRY',
  ];
  foreach ($headers as $header) {
    $value = strtoupper(trim((string) ($_SERVER[$header] ?? '')));
    if (preg_match('/^[A-Z]{2}$/', $value) && $value !== 'XX') {
      $country = $value;
      $source = 'header';
      break;
    }
  }

  if ($country === '') {
    $accept = (string) ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? '');
    if (preg_match('/[a-zA-Z]{2}[-_]([a-zA-Z]{2})/', $accept, $match)) {
      $country = strtoupper($match[1]);
      $source = 'language';
    }
  }

  $map = paperboy_country_currency_map();
  $currency = 'jmd';
  if ($country !== '' && isset($map[$country])) {
    $currency = $map[$country];
  } elseif ($source !== 'header') {
    $accept = strtolower((string) ($_SERVER['HTTP_ACCEPT_LANGUAGE'] ?? ''));
    $lang_map = paperboy_language_currency_map();
    if (preg_match('/^([a-z]{2})/', $accept, $match) && isset($lang_map[$match[1]])) {
      $currency = $lang_map[$match[1]];
      $source = 'language';
    } else {
      $country = $country ?: 'JM';
      $source = 'fallback';
    }
  }

  $rates = paperboy_currency_settings()['rates'] ?? [];
  if (empty($rates[$currency]) || (float) $rates[$currency] <= 0) {
    $currency = 'jmd';
  }

  return $cached = [
    'country' => $country ?: 'JM',
    'currency' => $currency,
    'source' => $source,
  ];
}

function paperboy_currency_defaults() {
  return [
    'base' => 'jmd',
    'mode' => 'fixed',
    'displayCount' => 3,
    'slots' => ['jmd', 'usd', 'gbp'],
    'enabled' => ['jmd', 'usd', 'gbp'],
    'rates' => [
      'jmd' => 1,
      'usd' => 157,
      'eur' => 170,
      'gbp' => 200,
      'cad' => 113,
      'aud' => 102,
      'nzd' => 94,
      'chf' => 176,
      'jpy' => 1.05,
      'cny' => 22,
      'hkd' => 20,
      'sgd' => 118,
      'inr' => 1.88,
      'mxn' => 8.2,
      'brl' => 28,
      'zar' => 8.8,
      'sek' => 15,
      'nok' => 14.5,
      'dkk' => 22.8,
      'pln' => 40,
      'aed' => 43,
      'twd' => 5,
      'krw' => 0.11,
      'ttd' => 23,
      'bbd' => 78,
      'xcd' => 58,
      'kyd' => 188,
    ],
  ];
}

function paperboy_currency_data_dir() {
  return dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data';
}

function paperboy_currency_store_path() {
  return paperboy_currency_data_dir() . DIRECTORY_SEPARATOR . 'currencies.php';
}

function paperboy_admin_store_path() {
  return paperboy_currency_data_dir() . DIRECTORY_SEPARATOR . 'admin.php';
}

function paperboy_currency_settings() {
  static $cached = null;
  if ($cached !== null) {
    return $cached;
  }

  $defaults = paperboy_currency_defaults();
  $path = paperboy_currency_store_path();
  if (is_file($path)) {
    $loaded = include $path;
    if (is_array($loaded)) {
      $defaults['enabled'] = isset($loaded['enabled']) && is_array($loaded['enabled'])
        ? $loaded['enabled']
        : $defaults['enabled'];
      $defaults['slots'] = isset($loaded['slots']) && is_array($loaded['slots'])
        ? $loaded['slots']
        : ($defaults['enabled'] ?? $defaults['slots']);
      $defaults['rates'] = isset($loaded['rates']) && is_array($loaded['rates'])
        ? array_merge($defaults['rates'], $loaded['rates'])
        : $defaults['rates'];
      if (!empty($loaded['base']) && is_string($loaded['base'])) {
        $defaults['base'] = strtolower($loaded['base']);
      }
      if (!empty($loaded['mode']) && is_string($loaded['mode'])) {
        $defaults['mode'] = strtolower($loaded['mode']);
      }
      if (isset($loaded['displayCount'])) {
        $defaults['displayCount'] = (int) $loaded['displayCount'];
      }
    }
  }

  $catalog = paperboy_currency_catalog();
  $defaults['base'] = isset($catalog[$defaults['base']]) ? $defaults['base'] : 'jmd';
  $defaults['rates'][$defaults['base']] = 1;
  $defaults['mode'] = $defaults['mode'] === 'geo' ? 'geo' : 'fixed';

  $slots = [];
  foreach ($defaults['slots'] as $code) {
    $code = strtolower((string) $code);
    if (isset($catalog[$code]) && !in_array($code, $slots, true)) {
      $slots[] = $code;
    }
  }
  if (!$slots) {
    $slots = ['jmd'];
  }
  $count = (int) $defaults['displayCount'];
  if ($count < 1) {
    $count = count($slots);
  }
  $count = min(4, max(1, $count));
  $defaults['displayCount'] = $count;
  $defaults['slots'] = array_slice($slots, 0, 4);
  $defaults['enabled'] = $defaults['slots'];

  return $cached = $defaults;
}

function paperboy_save_currency_settings(array $settings) {
  $catalog = paperboy_currency_catalog();
  $defaults = paperboy_currency_defaults();
  $base = 'jmd';
  $mode = (($settings['mode'] ?? 'fixed') === 'geo') ? 'geo' : 'fixed';

  $slots = [];
  foreach (($settings['slots'] ?? $settings['enabled'] ?? []) as $code) {
    $code = strtolower((string) $code);
    if (isset($catalog[$code]) && !in_array($code, $slots, true)) {
      $slots[] = $code;
    }
  }

  $count = (int) ($settings['displayCount'] ?? count($slots));
  $count = min(4, max(1, $count));
  if ($mode === 'fixed') {
    $slots = array_slice($slots, 0, $count);
    if (count($slots) < $count) {
      return 'Choose a currency for each of the ' . $count . ' price slots.';
    }
  } elseif (!$slots) {
    $slots = ['jmd'];
  }

  $rates = $defaults['rates'];
  foreach (($settings['rates'] ?? []) as $code => $rate) {
    $code = strtolower((string) $code);
    if (!isset($catalog[$code])) {
      continue;
    }
    $rate = is_numeric($rate) ? (float) $rate : 0;
    if ($rate > 0) {
      $rates[$code] = $rate;
    }
  }
  $rates[$base] = 1;

  $needed = $mode === 'geo' ? array_keys($catalog) : $slots;
  foreach ($needed as $code) {
    if ($mode === 'geo' && empty($rates[$code])) {
      continue;
    }
    if (empty($rates[$code]) || $rates[$code] <= 0) {
      return 'Enter an exchange rate for every currency that can appear on prices.';
    }
  }

  $dir = paperboy_currency_data_dir();
  if (!is_dir($dir) && !@mkdir($dir, 0755, true) && !is_dir($dir)) {
    return 'Could not create the data folder. Check folder permissions.';
  }

  $payload = [
    'base' => $base,
    'mode' => $mode,
    'displayCount' => $count,
    'slots' => $slots,
    'enabled' => $slots,
    'rates' => $rates,
  ];
  $export = "<?php\nreturn " . var_export($payload, true) . ";\n";
  if (@file_put_contents(paperboy_currency_store_path(), $export, LOCK_EX) === false) {
    return 'Could not save currency rates. Check folder permissions on /data.';
  }

  return '';
}

function paperboy_currency_meta($code) {
  $code = strtolower((string) $code);
  $catalog = paperboy_currency_catalog();
  return $catalog[$code] ?? [
    'code' => strtoupper($code),
    'name' => strtoupper($code),
    'symbol' => strtoupper($code) . ' ',
    'decimals' => 2,
  ];
}

function paperboy_enabled_currencies() {
  $settings = paperboy_currency_settings();
  $catalog = paperboy_currency_catalog();
  $out = [];
  foreach ($settings['enabled'] as $code) {
    if (isset($catalog[$code])) {
      $out[$code] = $catalog[$code];
    }
  }
  return $out;
}

function paperboy_selected_currency() {
  $enabled = paperboy_enabled_currencies();
  $cookie = strtolower((string) ($_COOKIE['pb_currency'] ?? ''));
  if ($cookie !== '' && isset($enabled[$cookie])) {
    return $cookie;
  }
  $settings = paperboy_currency_settings();
  if (isset($enabled[$settings['base']])) {
    return $settings['base'];
  }
  $keys = array_keys($enabled);
  return $keys ? $keys[0] : 'jmd';
}

function paperboy_convert_amount($amount, $from, $to = null) {
  $from = strtolower((string) $from);
  $to = strtolower((string) ($to ?: paperboy_selected_currency()));
  $amount = (float) $amount;
  if ($from === $to) {
    return $amount;
  }

  $rates = paperboy_currency_settings()['rates'];
  $from_rate = isset($rates[$from]) ? (float) $rates[$from] : 0;
  $to_rate = isset($rates[$to]) ? (float) $rates[$to] : 0;
  if ($from_rate <= 0 || $to_rate <= 0) {
    return $amount;
  }

  return ($amount * $from_rate) / $to_rate;
}

function paperboy_display_codes() {
  $settings = paperboy_currency_settings();
  if (($settings['mode'] ?? 'fixed') === 'geo') {
    $geo = paperboy_visitor_geo();
    return [$geo['currency']];
  }

  $count = min(4, max(1, (int) ($settings['displayCount'] ?? 1)));
  $slots = $settings['slots'] ?? $settings['enabled'] ?? ['jmd'];
  return array_slice($slots, 0, $count);
}

function paperboy_format_amount($amount, $currency = null) {
  $currency = strtolower((string) ($currency ?: paperboy_selected_currency()));
  $meta = paperboy_currency_meta($currency);
  $decimals = (int) $meta['decimals'];
  $rounded = $decimals === 0 ? round($amount) : round($amount, $decimals);
  if ($decimals === 0 || abs($rounded - round($rounded)) < 0.00001) {
    return $meta['symbol'] . number_format($rounded, 0);
  }
  return $meta['symbol'] . number_format($rounded, $decimals);
}

function paperboy_format_money_parts($amount, $from_currency) {
  $parts = [];
  $codes = paperboy_display_codes();
  if (!$codes) {
    $codes = ['jmd'];
  }
  foreach ($codes as $code) {
    $parts[] = paperboy_format_amount(paperboy_convert_amount($amount, $from_currency, $code), $code);
  }
  return $parts;
}

function paperboy_format_money_from($amount, $from_currency, $to_currency = null) {
  if ($to_currency !== null) {
    return paperboy_format_amount(paperboy_convert_amount($amount, $from_currency, $to_currency), $to_currency);
  }
  return implode(' / ', paperboy_format_money_parts($amount, $from_currency));
}

function paperboy_format_minor($minor, $from_currency, $to_currency = null) {
  return paperboy_format_money_from(((int) $minor) / 100, $from_currency, $to_currency);
}

function paperboy_format_money_html($amount, $from_currency) {
  $parts = paperboy_format_money_parts($amount, $from_currency);
  if (count($parts) <= 1) {
    return htmlspecialchars($parts[0] ?? '', ENT_QUOTES, 'UTF-8');
  }
  $html = '<span class="price-multi">';
  foreach ($parts as $i => $part) {
    $cls = $i === 0 ? 'price-multi-main' : 'price-multi-alt';
    $html .= '<span class="' . $cls . '">' . htmlspecialchars($part, ENT_QUOTES, 'UTF-8') . '</span>';
  }
  $html .= '</span>';
  return $html;
}

function paperboy_format_minor_html($minor, $from_currency) {
  return paperboy_format_money_html(((int) $minor) / 100, $from_currency);
}

function paperboy_currency_public_config() {
  $settings = paperboy_currency_settings();
  $enabled = [];
  foreach (paperboy_currency_catalog() as $code => $meta) {
    $rate = (float) ($settings['rates'][$code] ?? 0);
    if ($rate <= 0) {
      continue;
    }
    $enabled[$code] = [
      'code' => $meta['code'],
      'name' => $meta['name'],
      'symbol' => $meta['symbol'],
      'decimals' => (int) $meta['decimals'],
      'rate' => $rate,
    ];
  }

  return [
    'base' => $settings['base'],
    'mode' => $settings['mode'] ?? 'fixed',
    'selected' => paperboy_selected_currency(),
    'display' => paperboy_display_codes(),
    'geo' => paperboy_visitor_geo(),
    'countryMap' => paperboy_country_currency_map(),
    'languageMap' => paperboy_language_currency_map(),
    'enabled' => $enabled,
  ];
}

function paperboy_currency_switcher() {
  // Prices show every enabled currency at once, so no customer picker.
}

function paperboy_admin_settings() {
  $path = paperboy_admin_store_path();
  if (!is_file($path)) {
    return [];
  }
  $loaded = include $path;
  return is_array($loaded) ? $loaded : [];
}

function paperboy_save_admin_settings(array $settings) {
  $dir = paperboy_currency_data_dir();
  if (!is_dir($dir) && !@mkdir($dir, 0755, true) && !is_dir($dir)) {
    return false;
  }
  $export = "<?php\nreturn " . var_export($settings, true) . ";\n";
  return @file_put_contents(paperboy_admin_store_path(), $export, LOCK_EX) !== false;
}
