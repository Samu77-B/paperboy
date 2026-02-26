<?php
$page_title = 'Identification Cards';
$page_description = 'Professional ID card printing including PVC cards, PVC coloured cards, composite cards and loyalty cards.';
$current_page = 'services';
$depth = 1;
$banner_subtitle = 'PVC cards, PVC coloured cards, composite cards, loyalty cards';

$products = [
  ['name' => 'PVC Cards', 'image' => 'images/pvc-cards.jpg', 'link' => 'pvc-cards.php'],
  ['name' => 'PVC Coloured Cards', 'image' => 'images/pvc-coloured.jpg', 'link' => 'pvc-coloured-cards.php'],
  ['name' => 'Composite Cards', 'image' => 'images/composite-cards.jpg', 'link' => 'composite-cards.php'],
  ['name' => 'Loyalty Cards', 'image' => 'images/loyalty-cards.jpg', 'link' => 'loyalty-cards.php'],
];

include '../includes/category-page.php';
?>
