<?php
if (!defined('PAYSYNK_STORE')) {
  define('PAYSYNK_STORE', 'paperboy-ja');
  define('PAYSYNK_MERCHANT_ID', 'cmv2xa1s0000006jvb67lptil');
  define('PAYSYNK_ORIGIN', 'https://www.paysynk.com');
}

function paysynk_shop_url() {
  return PAYSYNK_ORIGIN . '/s/' . rawurlencode(PAYSYNK_STORE);
}

function paysynk_product_url($product_slug) {
  return paysynk_shop_url() . '/p/' . rawurlencode($product_slug);
}

function paysynk_product_iframe($product_slug, $title = 'Product', $min_height = 1100) {
  if ($product_slug === null || $product_slug === '') {
    return;
  }
  $src = htmlspecialchars(paysynk_product_url($product_slug), ENT_QUOTES, 'UTF-8');
  $label = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
  $height = (int) $min_height;
  echo '<div class="shop-catalog-embed">' . "\n";
  echo '  <iframe src="' . $src . '" style="width:100%;min-height:' . $height . 'px;border:0" title="' . $label . '" loading="lazy"></iframe>' . "\n";
  echo '</div>' . "\n";
}

function paysynk_cart_script() {
  $store = htmlspecialchars(PAYSYNK_STORE, ENT_QUOTES, 'UTF-8');
  $merchant = htmlspecialchars(PAYSYNK_MERCHANT_ID, ENT_QUOTES, 'UTF-8');
  echo '<script src="' . PAYSYNK_ORIGIN . '/cart.js" data-store="' . $store . '" data-merchant-id="' . $merchant . '" async></script>' . "\n";
}

function paysynk_embed_script() {
  echo '<script src="' . PAYSYNK_ORIGIN . '/embed.js" defer></script>' . "\n";
}

function paysynk_product_slot($product_slug) {
  if ($product_slug === null || $product_slug === '') {
    return;
  }
  $store = htmlspecialchars(PAYSYNK_STORE, ENT_QUOTES, 'UTF-8');
  $slug = htmlspecialchars($product_slug, ENT_QUOTES, 'UTF-8');
  echo '<div class="shop-grid">' . "\n";
  echo '  <div data-paysynk-product="' . $slug . '" data-store="' . $store . '"></div>' . "\n";
  echo '</div>' . "\n";
}

/**
 * PaySynk product slug for a site product page.
 * Defaults to the PHP filename. Overrides cover pages whose PaySynk slug differs.
 * Set $paysynk_product on a page to force a slug, or false to skip the embed.
 */
function paysynk_page_slug($script_path = null) {
  static $overrides = [
    'architectural-plans' => 'architectural-drawings',
    'bw-colour-printing' => 'colour-bw-printing',
    'compliment-slips' => 'comp-slips',
    'invitations-certificates' => 'certificates',
    'greetings-cards' => 'greeting-cards',
    'armbands' => 'wristbands',
    'composite-cards' => 'composite-id-cards',
    'pvc-cards' => 'pvc-id-cards',
    'retrackable-clips' => 'retractable-clips',
    'standee-display' => 'standees',
    'outdoor-banners-stands' => 'outdoor-banners',
  ];

  $path = $script_path ?: (string) ($_SERVER['SCRIPT_FILENAME'] ?? '');
  $file = strtolower(basename($path, '.php'));
  if ($file === '' || $file === 'index') {
    return '';
  }

  return $overrides[$file] ?? $file;
}

require_once __DIR__ . '/paysynk-catalog.php';
require_once __DIR__ . '/paysynk-preview.php';
require_once __DIR__ . '/currencies.php';

