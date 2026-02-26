<?php
$depth = $depth ?? 1;
include __DIR__ . '/head.php';
include __DIR__ . '/nav.php';
?>

  <div class="page-banner" <?php if (!empty($banner_bg)): ?>style="background-image:url('<?= $banner_bg ?>')"<?php endif; ?>>
    <h1><?= $page_title ?></h1>
    <?php if (!empty($banner_subtitle)): ?>
    <p><?= $banner_subtitle ?></p>
    <?php endif; ?>
  </div>

  <section class="cards-section">
    <div class="container">
      <div class="category-grid">
        <?php foreach ($products as $product): ?>
        <div class="category-card">
          <div class="category-card-img-wrap"><img src="<?= $base_url . $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" loading="lazy"></div>
          <div class="category-card-body">
            <h4><?= htmlspecialchars($product['name']) ?></h4>
            <a href="<?= $product['link'] ?>" class="link-dark">Shop now</a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

<?php include __DIR__ . '/footer.php'; ?>
