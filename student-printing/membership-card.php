<?php
// Example membership card view (e.g. after login or with ?id=XXX)
$page_title = 'Your Membership Card';
$page_description = 'Paperboy JA Student Club membership card. Show this for your 10% discount on student printing.';
$page_url = 'student-printing/membership-card.php';
$current_page = 'student-card';
$depth = 1;
$student_section = true;

$base_url = '../';
// In a full implementation, member number would come from session or database
$member_name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Member';
$member_number = isset($_GET['id']) ? htmlspecialchars($_GET['id']) : 'PB-STU-' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT);

include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav-student.php';
?>

  <section class="student-page-banner">
    <div class="container">
      <h1>Your Membership Card</h1>
      <p>Show this card (or your member number) for 10% off student printing</p>
    </div>
  </section>

  <section class="student-card-section">
    <div class="container container-narrow">
      <div class="membership-card-full">
        <div class="membership-card-full-header">
          <img src="<?= $base_url ?>images/PBJA_logo.svg" alt="Paperboy JA" class="membership-card-logo">
          <span>Student Club</span>
        </div>
        <div class="membership-card-full-body">
          <div class="membership-card-full-name"><?= $member_name ?></div>
          <div class="membership-card-full-number">Member #<?= $member_number ?></div>
          <div class="membership-card-full-discount">10% discount on all student-related products</div>
        </div>
        <div class="membership-card-full-footer">Valid at Paperboy JA · Kingston, Jamaica</div>
      </div>
      <p class="card-instructions">Show this page in-store or enter your member number when ordering online to receive your 10% discount.</p>
      <a href="index.php" class="btn btn-blue">Back to Student Printing</a>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
