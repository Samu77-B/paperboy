<?php
$page_title = 'Die-Cutting';
$page_description = 'Custom die-cutting in Kingston, Jamaica. Shape labels, stickers, hang tags, packaging, and cards to your design — Paperboy JA.';
$page_url = 'accessories/die-cutting.php';
$current_page = 'services';
$depth = 1;
$category_link = 'accessories/';
$banner_photo = 'images/die-cutting.jpg';
$banner_subtitle = 'custom shapes for labels, stickers, tags, and packaging';
$page_css = <<<'CSS'
.page-hero-photo {
  position: relative;
  background: #c8c8c8;
}
.page-hero-photo img {
  width: 100%;
  height: min(80vh, 860px);
  object-fit: cover;
  object-position: center 38%;
  display: block;
}
.page-hero-photo-caption {
  padding: 28px 20px 32px;
  text-align: center;
  color: #fff;
  background: #202020;
}
.page-hero-photo-caption h1 {
  font-size: 42px;
  font-weight: 900;
  text-transform: uppercase;
  line-height: 1.15;
}
.page-hero-photo-caption p {
  font-size: 16px;
  max-width: 600px;
  margin: 10px auto 0;
}
@media (max-width: 767px) {
  .page-hero-photo img {
    height: min(70vh, 640px);
    object-position: center 32%;
  }
  .page-hero-photo-caption h1 { font-size: 28px; }
}
CSS;

$extra_content = <<<'HTML'
      <p>Die-cutting trims printed work into a custom shape rather than a straight rectangle. Use it for stickers, product labels, hang tags, packaging, invitations, and display pieces that need a distinctive outline.</p>

      <h2 style="margin-top: 40px;">What we die-cut</h2>
      <p><strong>Stickers and labels</strong> — kiss-cut sheets or individually cut pieces in any outline.<br>
      <strong>Hang tags and packaging</strong> — custom tags, sleeves, and cartons with clean, accurate edges.<br>
      <strong>Cards and invitations</strong> — shaped business cards, event stationery, and presentation pieces.</p>

      <h2 style="margin-top: 40px;">Artwork</h2>
      <p>Supply print-ready artwork as a PDF or Illustrator file in CMYK, with 3mm bleed and a clearly marked cut path. Vector cut lines work best. If you need help preparing the file, our design team can set it up before production.</p>
HTML;

include __DIR__ . '/../includes/product-page.php';
?>
