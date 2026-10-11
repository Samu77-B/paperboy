<?php
$current_page = 'services';
$depth = 0;
$selected_slug = isset($_GET['p']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower((string) $_GET['p'])) : '';

require_once __DIR__ . '/includes/paysynk.php';
$selected = paysynk_product_by_slug($selected_slug);
$catalog = paysynk_catalog();

if ($selected) {
  $page_title = $selected['name'];
  $page_description = $selected['name'] . ' printing from Paperboy JA in Kingston, Jamaica.';
  $page_url = 'products.php?p=' . rawurlencode($selected['slug']);
  $banner_subtitle = 'order online · PaySynk checkout';
  $paysynk_product = $selected['slug'];
  $paysynk_load_embed = true;
} else {
  $page_title = 'Shop';
  $page_description = 'Shop printing products from Paperboy JA — business cards, banners, flyers, ID cards, and more.';
  $page_url = 'products.php';
  $banner_subtitle = 'choose a product to order';
  $selected_slug = '';
}

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/nav.php';
?>

  <div class="page-banner"<?php if ($selected && !empty($selected['banner'])): ?> style="background-image:url('<?= htmlspecialchars($selected['banner']) ?>')"<?php endif; ?>>
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
        <div class="shop-grid">
          <?php paysynk_product_slot($selected['slug']); ?>
        </div>
        <div class="quote-cta">
          <h3>Need a Custom Quote?</h3>
          <p>Get a same-day quote for your <?= htmlspecialchars(strtolower($selected['name'])) ?> project.</p>
          <a href="request-a-quote.php?product=<?= urlencode($selected['name']) ?>" class="btn btn-blue">Request a Quote</a>
        </div>
      </div>
      <?php endif; ?>

      <?php foreach ($catalog as $group_title => $items): ?>
      <div class="shop-group">
        <h2 class="shop-group-title"><?= htmlspecialchars($group_title) ?></h2>
        <div class="shop-grid category-grid">
          <?php foreach ($items as $product): ?>
          <?php $is_active = $selected && $product['slug'] === $selected['slug']; ?>
          <a class="category-card shop-card<?= $is_active ? ' is-active' : '' ?>" href="<?= htmlspecialchars(paysynk_product_href($product['slug'])) ?>">
            <div class="category-card-img-wrap"><img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy"></div>
            <div class="category-card-body">
              <h4><?= htmlspecialchars($product['name']) ?></h4>
              <span class="link-dark"><?= $is_active ? 'Viewing' : 'Shop now' ?></span>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </section>

<?php include __DIR__ . '/includes/footer.php'; ?>
