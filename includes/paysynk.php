<?php
if (!defined('PAYSYNK_STORE')) {
  define('PAYSYNK_STORE', 'paperboy-ja');
  define('PAYSYNK_MERCHANT_ID', 'cmv2xa1s0000006jvb67lptil');
  define('PAYSYNK_ORIGIN', 'https://www.paysynk.com');
}

function paysynk_shop_url() {
  return PAYSYNK_ORIGIN . '/s/' . rawurlencode(PAYSYNK_STORE);
}

function paysynk_cart_script() {
  $store = htmlspecialchars(PAYSYNK_STORE, ENT_QUOTES, 'UTF-8');
  $merchant = htmlspecialchars(PAYSYNK_MERCHANT_ID, ENT_QUOTES, 'UTF-8');
  echo '<script src="' . PAYSYNK_ORIGIN . '/cart.js" data-store="' . $store . '" data-merchant-id="' . $merchant . '" data-accent="#00aeec" data-font="inherit" data-radius="inherit"></script>' . "\n";
  echo '<script>document.querySelectorAll(\'script[src*="cart.js"][data-store]\').forEach(function(s){s.removeAttribute("data-store");});</script>' . "\n";
}

function paysynk_embed_script() {
  echo '<script src="' . PAYSYNK_ORIGIN . '/embed.js" data-accent="#00aeec" data-font="inherit" data-radius="inherit" defer></script>' . "\n";
}

function paysynk_product_slot($product_slug) {
  if ($product_slug === null || $product_slug === '') {
    return;
  }
  $store = htmlspecialchars(PAYSYNK_STORE, ENT_QUOTES, 'UTF-8');
  $slug = htmlspecialchars($product_slug, ENT_QUOTES, 'UTF-8');
  echo '<div class="paysynk-product-slot" data-paysynk-product="' . $slug . '" data-store="' . $store . '"></div>' . "\n";
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

