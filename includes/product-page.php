<?php
$depth = $depth ?? 1;
include __DIR__ . '/head.php';
include __DIR__ . '/nav.php';
?>

  <!-- Page Banner -->
  <?php if (!empty($video_poster)): ?>
  <div class="video-banner">
    <video autoplay loop muted playsinline style="background-image:url('<?= $video_poster ?>')">
      <?php if (!empty($video_mp4)): ?><source src="<?= $video_mp4 ?>"><?php endif; ?>
      <?php if (!empty($video_webm)): ?><source src="<?= $video_webm ?>"><?php endif; ?>
    </video>
  </div>
  <?php endif; ?>

  <div class="page-banner" <?php if (!empty($banner_bg)): ?>style="background-image:url('<?= $banner_bg ?>')"<?php endif; ?>>
    <h1><?= $page_title ?></h1>
    <?php if (!empty($banner_subtitle)): ?>
    <p><?= $banner_subtitle ?></p>
    <?php endif; ?>
  </div>

  <!-- Product Content -->
  <section class="product-content">
    <div class="container">
      <a href="<?= $base_url . ($category_link ?? '') ?>" class="back-link">/ BACK</a>

      <!-- Ecwid Product Browser (always shown; set $ecwid_product_id on the page to open a specific product) -->
      <div id="my-store-64309912"></div>
      <script>
        window.ec = window.ec || {};
        window.ec.storefront = window.ec.storefront || {};
        window.ec.storefront.enable_navigation = true;
        window.ec.storefront.product_details_layout = "TWO_COLUMNS_SIDEBAR_ON_THE_RIGHT";
        window.ec.storefront.product_details_gallery_layout = "IMAGE_SINGLE_THUMBNAILS_VERTICAL";
        window.ec.storefront.product_details_show_product_name = false;
        window.ec.storefront.product_details_show_breadcrumbs = false;
        window.ec.storefront.product_details_show_product_sku = false;
        window.ec.storefront.product_details_show_product_price = true;
        window.ec.storefront.product_details_show_in_stock_label = false;
        window.ec.storefront.product_details_show_number_of_items_in_stock = false;
        window.ec.storefront.product_details_show_qty = true;
        window.ec.storefront.product_details_show_wholesale_prices = false;
        window.ec.storefront.product_details_show_product_options = true;
        window.ec.storefront.product_details_show_product_description = true;
        window.ec.storefront.product_details_show_share_buttons = false;
        window.ec.storefront.product_details_show_subtitle = true;
        <?php
        $pbParams = '"categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list"';
        if (!empty($ecwid_product_id)) {
          $pbParams .= ",\"defaultProductId=" . $ecwid_product_id . "\"";
        }
        if (!empty($ecwid_default_slug)) {
          $pbParams .= ",\"defaultSlug=" . addslashes($ecwid_default_slug) . "\"";
        }
        $pbParams .= ',"id=my-store-64309912"';
        ?>
        xProductBrowser(<?= $pbParams ?>);
      </script>

      <?php if (!empty($extra_content)): ?>
      <?= $extra_content ?>
      <?php endif; ?>

      <!-- Quote CTA -->
      <div class="quote-cta">
        <h3>Need a Custom Quote?</h3>
        <p>Get a same-day quote for your <?= strtolower($page_title) ?> project.</p>
        <a href="<?= $base_url ?>request-a-quote.php?product=<?= urlencode($page_title) ?>" class="btn btn-blue">Request a Quote</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
