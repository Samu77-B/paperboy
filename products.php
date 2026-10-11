<?php
$current_page = 'services';
$depth = 0;
$selected_slug = isset($_GET['p']) ? preg_replace('/[^a-z0-9\-]/', '', strtolower((string) $_GET['p'])) : '';

require_once __DIR__ . '/includes/paysynk.php';
$selected = paysynk_product_by_slug($selected_slug);
$catalog = paysynk_catalog();
$remote = $selected ? paysynk_remote_product($selected['slug']) : null;
$remote_product = is_array($remote) ? ($remote['product'] ?? null) : null;
$remote_store = is_array($remote) ? ($remote['store'] ?? null) : null;

if ($selected) {
  $page_title = $selected['name'];
  $page_description = $selected['name'] . ' printing from Paperboy JA in Kingston, Jamaica.';
  $page_url = 'products.php?p=' . rawurlencode($selected['slug']);
  $banner_bg = $remote_product ? '' : ($selected['banner'] ?? $selected['image'] ?? '');
  $paysynk_product = $selected['slug'];
  $paysynk_load_embed = empty($remote_product);
  if ($remote_product) {
    $page_scripts = ['js/paysynk-config.js'];
  }
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

  <?php if (!$remote_product): ?>
  <div class="page-banner<?= !empty($banner_bg) ? ' has-photo' : '' ?>"<?php if (!empty($banner_bg)): ?> style="background-image:url('<?= htmlspecialchars($banner_bg) ?>')"<?php endif; ?>>
    <h1><?= htmlspecialchars($page_title) ?></h1>
    <?php if (!empty($banner_subtitle)): ?>
    <p><?= htmlspecialchars($banner_subtitle) ?></p>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <section class="product-content shop-page">
    <div class="container">
      <?php if ($selected): ?>
      <div class="shop-product-panel" id="shop-product">
        <a href="products.php" class="back-link">/ ALL PRODUCTS</a>

        <?php if ($remote_product): ?>
        <?php
          $product_image = paysynk_product_image($remote_product, $selected['image'] ?? '');
          $product_image_fallback = $selected['image'] ?? '';
          $start_minor = paysynk_starting_price_minor($remote_product);
          $currency = $remote_store['currency'] ?? 'gbp';
          $shopping_on = !empty($remote_store['paymentsActive']);
        ?>
        <div class="shop-product-layout" data-paysynk-config>
          <div class="shop-product-media">
            <img src="<?= htmlspecialchars($product_image) ?>" alt="<?= htmlspecialchars($remote_product['title'] ?? $selected['name']) ?>"<?php if ($product_image_fallback && $product_image_fallback !== $product_image): ?> onerror="this.onerror=null;this.src='<?= htmlspecialchars($product_image_fallback, ENT_QUOTES) ?>'"<?php endif; ?>>
            <p class="shop-product-caption" data-ps-caption></p>
          </div>
          <div class="shop-product-buy">
            <h1 class="shop-product-title"><?= htmlspecialchars($remote_product['title'] ?? $selected['name']) ?></h1>
            <?php if (!empty($remote_product['description'])): ?>
            <p class="shop-product-desc"><?= htmlspecialchars($remote_product['description']) ?></p>
            <?php endif; ?>
            <p class="shop-product-price" data-ps-price data-money-minor="<?= (int) $start_minor ?>" data-money-from="<?= htmlspecialchars($currency) ?>"><?= paperboy_format_minor_html($start_minor, $currency) ?></p>
            <p class="shop-currency-note">Converted at the shop rate. Checkout stays in <?= htmlspecialchars(strtoupper((string) $currency)) ?>.</p>
            <form class="shop-config-form" onsubmit="return false;">
              <?php foreach (($remote_product['options'] ?? []) as $option): ?>
              <label class="shop-config-field">
                <span><?= htmlspecialchars($option['name']) ?><?= !empty($option['required']) ? ' *' : '' ?></span>
                <select data-option-id="<?= htmlspecialchars($option['id']) ?>"<?= !empty($option['required']) ? ' required' : '' ?>>
                  <?php foreach (($option['values'] ?? []) as $value): ?>
                  <option value="<?= htmlspecialchars($value['id']) ?>"><?= htmlspecialchars($value['label']) ?></option>
                  <?php endforeach; ?>
                </select>
              </label>
              <?php endforeach; ?>
              <?php if (!empty($remote_product['uploadsEnabled'])): ?>
              <label class="shop-config-field">
                <span>Artwork</span>
                <input type="file" accept=".pdf,.ai,.eps,.jpg,.jpeg,.png,.tif,.tiff">
              </label>
              <?php endif; ?>
              <?php if (!empty($remote_product['instructionsEnabled'])): ?>
              <label class="shop-config-field">
                <span>Notes</span>
                <textarea rows="3" placeholder="Tell us about the job"></textarea>
              </label>
              <?php endif; ?>
              <button type="button" class="btn btn-blue shop-config-add"<?= $shopping_on ? '' : ' disabled' ?>>
                <?= $shopping_on ? 'Add to cart' : 'Coming soon' ?>
              </button>
            </form>
          </div>
        </div>
        <script type="application/json" id="paysynk-config-data"><?= json_encode([
          'store' => [
            'slug' => $remote_store['slug'] ?? PAYSYNK_STORE,
            'currency' => $currency,
            'paymentsActive' => $shopping_on,
          ],
          'product' => [
            'slug' => $remote_product['slug'] ?? $selected['slug'],
            'title' => $remote_product['title'] ?? $selected['name'],
            'basePriceMinor' => (int) ($remote_product['basePriceMinor'] ?? 0),
            'options' => $remote_product['options'] ?? [],
            'variations' => $remote_product['variations'] ?? [],
          ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?></script>

        <?php $related = paysynk_related_products($remote_product); ?>
        <?php if ($related): ?>
        <div class="shop-related">
          <h2 class="shop-group-title">You may also like</h2>
          <div class="shop-grid category-grid">
            <?php foreach ($related as $item): ?>
            <a class="category-card shop-card" href="<?= htmlspecialchars(paysynk_product_href($item['slug'])) ?>">
              <div class="category-card-img-wrap">
                <?php if (!empty($item['image'])): ?>
                <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" loading="lazy">
                <?php endif; ?>
              </div>
              <div class="category-card-body">
                <h4><?= htmlspecialchars($item['title']) ?></h4>
                <span class="link-dark">Shop now</span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
        <?php else: ?>
        <div class="shop-grid">
          <?php paysynk_product_slot($selected['slug']); ?>
        </div>
        <?php endif; ?>

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
