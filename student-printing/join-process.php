<?php
/**
 * Student Club join form handler.
 * On submit: validate, then redirect to membership card with generated member ID.
 * Payment (e.g. Stripe $5/month) can be integrated later.
 */
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  header('Location: join.php');
  exit;
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$school = trim($_POST['school'] ?? '');

if (empty($name) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: join.php?error=invalid');
  exit;
}

// Generate a unique-looking member number (in production, save to DB and use real ID)
$member_id = 'PB-STU-' . strtoupper(substr(md5($email . time()), 0, 6));

// Optional: store in session for display; in production save to DB and send email with card
$_SESSION['student_member_name'] = $name;
$_SESSION['student_member_id'] = $member_id;
$_SESSION['student_member_email'] = $email;

// Redirect to membership card view
header('Location: membership-card.php?name=' . urlencode($name) . '&id=' . urlencode($member_id));
exit;
