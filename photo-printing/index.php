<?php
$page_title = 'Photo Printing';
$page_description = 'Professional photo printing services including photo prints, posters and canvas printing for personal and commercial use.';
$current_page = 'services';
$depth = 1;
$banner_subtitle = 'photo prints, posters, canvas printing';

$products = [
  ['name' => 'Photo Prints', 'image' => 'images/PM1.jpg', 'link' => 'photo-prints.php'],
  ['name' => 'Posters', 'image' => 'images/posters.jpg', 'link' => 'posters.php'],
  ['name' => 'Canvas Printing', 'image' => 'images/canvas.jpg', 'link' => 'canvas-printing.php'],
];

include '../includes/category-page.php';
?>
