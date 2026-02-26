<?php
$page_title = 'Design Templates';
$page_description = 'Free design templates for business cards, office stationery, calendars and more. Download and customise for your printing needs.';
$current_page = 'templates';
$depth = 1;
$banner_subtitle = 'business cards, office stationery, calendars and more';

$products = [
  ['name' => 'Single Sided Business Cards', 'image' => 'images/singlebc.jpg', 'link' => 'single-sided-business-cards.php'],
  ['name' => 'Double Sided Business Cards', 'image' => 'images/doublebc.jpg', 'link' => 'double-sided-business-cards.php'],
  ['name' => 'Demi Cards', 'image' => 'images/demicards.jpg', 'link' => 'demi-card-templates.php'],
  ['name' => 'Office Stationary', 'image' => 'images/officestat.jpg', 'link' => 'office-stationary-templates.php'],
  ['name' => 'Calendars', 'image' => 'images/calendartemplates.jpg', 'link' => 'calendar-templates.php'],
];

include '../includes/category-page.php';
?>
