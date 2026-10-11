<?php
$page_title = 'BW & Colour Printing';
$page_description = 'Professional black & white and full colour document printing in Kingston, Jamaica. Mix paper sizes and print types in one order — Paperboy JA.';
$page_url = 'business-products/bw-colour-printing.php';
$current_page = 'services';
$depth = 1;
$category_link = 'business-products/';
$print_is_student = false;

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav.php';
?>

  <div class="page-banner">
    <h1><?= htmlspecialchars($page_title) ?></h1>
    <p>Documents · mixed sizes · black &amp; white or colour</p>
  </div>

  <section class="product-content">
    <div class="container">
      <a href="<?= $base_url . $category_link ?>" class="back-link">/ BACK</a>

      <?php include __DIR__ . '/../includes/print-configurator.php'; ?>

      <div class="quote-cta">
        <h3>Need a Custom Quote?</h3>
        <p>Large runs, special paper, or finishing (binding, laminating, die-cutting)? Get a same-day quote.</p>
        <a href="<?= $base_url ?>request-a-quote.php?product=<?= urlencode($page_title) ?>" class="btn btn-blue">Request a Quote</a>
      </div>
    </div>
  </section>

<?php
$page_scripts = [
  $base_url . 'js/print-pricing.js',
  $base_url . 'js/print-configurator.js',
];
include __DIR__ . '/../includes/footer.php';
?>
