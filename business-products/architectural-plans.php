<?php
$page_title = 'Architectural Plans';
$page_description = 'Large-format architectural plan printing in Kingston, Jamaica. Blueprints, CAD drawings, and construction plans—Paperboy JA produces accurate, high-quality prints for architects and builders.';
$current_page = 'services';
$depth = 1;
$category_link = 'business-products/';
include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav.php';
?>

  <div class="page-banner">
    <h1><?= $page_title ?></h1>
  </div>

  <!-- Product Content -->
  <section class="product-content">
    <div class="container">
      <a href="<?= $base_url . $category_link ?>" class="back-link">/ BACK</a>

      <div id="my-store-64309912"></div>
      <div>
        <script data-cfasync="false" type="text/javascript" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2026-03-08" charset="utf-8"></script>
        <script type="text/javascript">
          Ecwid.init();
          window.ec=window.ec||{};
          window.ec.storefront=window.ec.storefront||{};
          window.ec.storefront.enable_navigation=true;
          window.ec.storefront.product_details_layout="TWO_COLUMNS_SIDEBAR_ON_THE_RIGHT";
          window.ec.storefront.product_details_gallery_layout="IMAGE_SINGLE_THUMBNAILS_VERTICAL";
          window.ec.storefront.product_details_two_columns_with_right_sidebar_show_product_description_on_sidebar=true;
          window.ec.storefront.product_details_two_columns_with_left_sidebar_show_product_description_on_sidebar=false;
          window.ec.storefront.product_details_show_product_name=true;
          window.ec.storefront.product_details_show_breadcrumbs=false;
          window.ec.storefront.product_details_show_product_sku=true;
          window.ec.storefront.product_details_show_product_price=true;
          window.ec.storefront.product_details_show_in_stock_label=false;
          window.ec.storefront.product_details_show_number_of_items_in_stock=false;
          window.ec.storefront.product_details_show_qty=false;
          window.ec.storefront.product_details_show_wholesale_prices=true;
          window.ec.storefront.product_details_show_product_options=true;
          window.ec.storefront.product_details_show_product_description=true;
          window.ec.storefront.product_details_show_delivery_time=undefined;
          window.ec.storefront.product_details_show_share_buttons=true;
          window.ec.storefront.product_details_position_product_name=100;
          window.ec.storefront.product_details_position_breadcrumbs=200;
          window.ec.storefront.product_details_position_product_sku=300;
          window.ec.storefront.product_details_position_product_price=400;
          window.ec.storefront.product_details_position_product_options=undefined;
          window.ec.storefront.product_details_position_buy_button=600;
          window.ec.storefront.product_details_position_wholesale_prices=700;
          window.ec.storefront.product_details_position_product_description=800;
          window.ec.storefront.product_details_position_delivery_time=undefined;
          window.ec.storefront.product_details_position_share_buttons=900;
          window.ec.storefront.product_details_position_subtitle=500;
          window.ec.storefront.product_details_show_subtitle=true;
          xProductBrowser("categoriesPerRow=3","views=grid(20,3) list(60) table(60)","categoryView=grid","searchView=list","defaultProductId=429802158","defaultSlug=architectural-drawings","id=my-store-64309912");
        </script>
      </div>

      <!-- Quote CTA -->
      <div class="quote-cta">
        <h3>Need a Custom Quote?</h3>
        <p>Get a same-day quote for your <?= strtolower($page_title) ?> project.</p>
        <a href="<?= $base_url ?>request-a-quote.php?product=<?= urlencode($page_title) ?>" class="btn btn-blue">Request a Quote</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
