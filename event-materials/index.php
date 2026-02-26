<?php
$page_title = 'Event Materials';
$page_description = 'Professional event material printing including certificates, event tickets, invitations, gift certificates, greeting cards, wristbands, programs and sporting bibs.';
$current_page = 'services';
$depth = 1;
$banner_subtitle = 'certificates, tickets, invitations, gift certificates, greeting cards, wristbands, programs, sporting bibs';

$products = [
  ['name' => 'Certificates', 'image' => 'images/certificates.jpg', 'link' => 'invitations-certificates.php'],
  ['name' => 'Event Tickets', 'image' => 'images/eventtickets.jpg', 'link' => 'event-tickets.php'],
  ['name' => 'Invitations', 'image' => 'images/pexels-dmitry-zvolskiy-1805599.jpg', 'link' => 'invitations.php'],
  ['name' => 'Gift Certificates', 'image' => 'images/giftcertificates.jpg', 'link' => 'gift-certificates.php'],
  ['name' => 'Greeting Cards', 'image' => 'images/greetingcards.jpg', 'link' => 'greetings-cards.php'],
  ['name' => 'Wristbands', 'image' => 'images/armbands.jpg', 'link' => 'armbands.php'],
  ['name' => 'Programs', 'image' => 'images/programs.jpg', 'link' => 'programs.php'],
  ['name' => 'Sporting Bibs', 'image' => 'images/sportingbibs.jpg', 'link' => 'sporting-bibs.php'],
];

include '../includes/category-page.php';
?>
