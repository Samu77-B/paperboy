<?php
$depth = $depth ?? 1;
include __DIR__ . '/head.php';
if (!isset($paysynk_product)) {
  $paysynk_product = paysynk_page_slug();
}
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

  <?php if (!empty($banner_photo)): ?>
  <div class="page-hero-photo">
    <img src="<?= htmlspecialchars($base_url . $banner_photo) ?>" alt="<?= htmlspecialchars($page_title) ?>">
    <div class="page-hero-photo-caption">
      <h1><?= $page_title ?></h1>
      <?php if (!empty($banner_subtitle)): ?>
      <p><?= $banner_subtitle ?></p>
      <?php endif; ?>
    </div>
  </div>
  <?php else: ?>
  <div class="page-banner" <?php if (!empty($banner_bg)): ?>style="background-image:url('<?= $banner_bg ?>')"<?php endif; ?>>
    <h1><?= $page_title ?></h1>
    <?php if (!empty($banner_subtitle)): ?>
    <p><?= $banner_subtitle ?></p>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- Product Content -->
  <section class="product-content">
    <div class="container">
      <a href="<?= $base_url . ($category_link ?? '') ?>" class="back-link">/ BACK</a>

      <?php if (!empty($extra_content)): ?>
      <?= $extra_content ?>
      <?php endif; ?>

      <?php
      if (!empty($paysynk_embed)) {
        $paysynk_load_embed = true;
        echo $paysynk_embed;
      } elseif (!empty($paysynk_product)) {
        $paysynk_load_embed = true;
        paysynk_product_slot($paysynk_product);
      }
      ?>

      <!-- Quote CTA -->
      <div class="quote-cta">
        <h3>Need a Custom Quote?</h3>
        <p>Get a same-day quote for your <?= strtolower($page_title) ?> project.</p>
        <a href="<?= $base_url ?>request-a-quote.php?product=<?= urlencode($page_title) ?>" class="btn btn-blue">Request a Quote</a>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
