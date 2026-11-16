<?php
$current_page = 'services';
$depth = 0;
$selected_slug = isset($_GET['p']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower((string) $_GET['p'])) : '';

require_once __DIR__ . '/includes/paysynk.php';
$selected = paysynk_product_by_slug($selected_slug);

if ($selected) {
  $page_title = $selected['name'];
  $page_description = $selected['name'] . ' printing from Paperboy JA in Kingston, Jamaica.';
  $page_url = 'products.php?p=' . rawurlencode($selected['slug']);
  $banner_bg = $selected['banner'] ?? $selected['image'] ?? '';
  $paysynk_product = $selected['slug'];
  $paysynk_load_embed = ($selected['slug'] !== 'business-cards');
} else {
  $page_title = 'Shop';
  $page_description = 'Shop printing products from Paperboy JA — business cards, banners, flyers, ID cards, and more.';
  $page_url = 'products.php';
  $banner_subtitle = 'choose a product to order';
  $banner_bg = '';
  $selected_slug = '';
}

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/nav.php';
?>

  <div class="page-banner<?= !empty($banner_bg) ? ' has-photo' : '' ?>"<?php if (!empty($banner_bg)): ?> style="background-image:url('<?= htmlspecialchars($banner_bg) ?>')"<?php endif; ?>>
    <h1><?= htmlspecialchars($page_title) ?></h1>
    <?php if (!empty($banner_subtitle)): ?>
    <p><?= htmlspecialchars($banner_subtitle) ?></p>
    <?php endif; ?>
  </div>

  <section class="product-content shop-page">
    <div class="container">
      <?php if ($selected): ?>
      <div class="shop-product-panel" id="shop-product">
        <a href="products.php" class="back-link">/ ALL PRODUCTS</a>

        <?php
        if ($selected['slug'] === 'business-cards') {
          paysynk_product_iframe('business-cards', 'Business Cards', 1100);
        } else {
          paysynk_product_slot($selected['slug']);
        }
        ?>

        <div class="quote-cta">
          <h3>Need a Custom Quote?</h3>
          <p>Get a same-day quote for your <?= htmlspecialchars(strtolower($selected['name'])) ?> project.</p>
          <a href="request-a-quote.php?product=<?= urlencode($selected['name']) ?>" class="btn btn-blue">Request a Quote</a>
        </div>
      </div>
      <?php else: ?>
      <div class="shop-catalog-embed">
        <iframe src="<?= htmlspecialchars(paysynk_shop_url(), ENT_QUOTES, 'UTF-8') ?>" style="width:100%;min-height:780px;border:0" title="Shop catalog" loading="lazy"></iframe>
      </div>
      <?php endif; ?>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
