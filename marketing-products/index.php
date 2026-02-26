<?php
$page_title = 'Marketing Products';
$page_description = 'Professional marketing product printing including brochures, calendars, catalogues, flyers, magazines, standee displays, easel backs and tent cards.';
$current_page = 'services';
$depth = 1;
$banner_subtitle = 'brochures, calendars, catalogues, flyers, magazines, standees, easel backs, tent cards';

$products = [
  ['name' => 'Brochures', 'image' => 'images/brochures.jpg', 'link' => 'brochures.php'],
  ['name' => 'Calendars', 'image' => 'images/calendars.jpg', 'link' => 'calendars.php'],
  ['name' => 'Catalogues', 'image' => 'images/1000_F_79257984_Y1AuKLFwUymOZ1sAsn5f03m8XcgNXsVw.jpg', 'link' => 'catalogues.php'],
  ['name' => 'Flyers', 'image' => 'images/flyers.jpg', 'link' => 'flyers.php'],
  ['name' => 'Magazines', 'image' => 'images/pexels-kaboompics-com-6664.jpg', 'link' => 'magazines.php'],
  ['name' => 'Standee Display', 'image' => 'images/standee.jpg', 'link' => 'standee-display.php'],
  ['name' => 'Easel Backs', 'image' => 'images/easelback.jpg', 'link' => 'easel-backs.php'],
  ['name' => 'Tent Cards', 'image' => 'images/tentcard.jpg', 'link' => 'tent-cards.php'],
];

include '../includes/category-page.php';
?>
