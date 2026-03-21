<?php
$page_title = 'Student Printing Service';
$page_description = 'Join the Paperboy JA Student Club for 10% off all student printing. Get an electronic membership card, unique member number, and affordable printing for students in Kingston, Jamaica.';
$page_url = 'student-printing/';
$current_page = 'student-printing';
$depth = 1;
$student_section = true;

$base_url = '../';
include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav-student.php';
?>

  <!-- Student Hero (background: images/studentImage01.jpg) -->
  <section class="student-hero" aria-label="Student printing">
    <div class="container">
      <div class="student-hero-badge">Student Printing Service</div>
      <h1>Print Smarter.<br>Save More.</h1>
      <p class="student-hero-lead">Join the Paperboy JA Student Club for <strong>10% off</strong> all student-related printing. Get your digital membership card and start saving today.</p>
      <div class="student-hero-cta">
        <a href="join.php" class="btn btn-gold">Join the Club — $5/month</a>
        <a href="<?= $base_url ?>contact.php" class="btn btn-outline-light">Contact Us</a>
      </div>
    </div>
  </section>

  <!-- Benefits -->
  <section class="student-benefits">
    <div class="container">
      <h2>Why Join the Student Club?</h2>
      <div class="student-benefits-grid">
        <div class="student-benefit-card">
          <div class="student-benefit-icon">
            <img src="<?= $base_url ?>images/percentage.png" alt="10% discount" width="72" height="72" loading="lazy" decoding="async">
          </div>
          <h3>10% Discount</h3>
          <p>Save on all student-related products—assignments, reports, binding, laminating, posters, and more.</p>
        </div>
        <div class="student-benefit-card">
          <div class="student-benefit-icon">
            <img src="<?= $base_url ?>images/Membership.png" alt="Electronic membership card" width="72" height="72" loading="lazy" decoding="async">
          </div>
          <h3>Electronic Membership Card</h3>
          <p>Get a digital membership card with your unique member number. Show it in-store or use your number online.</p>
        </div>
        <div class="student-benefit-card">
          <div class="student-benefit-icon">
            <img src="<?= $base_url ?>images/dollars.png" alt="$5 per month" width="72" height="72" loading="lazy" decoding="async">
          </div>
          <h3>Just $5 per Month</h3>
          <p>One low monthly fee. Cancel anytime. Your discount easily pays for itself when you print regularly.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- What's included -->
  <section class="student-products bg-light">
    <div class="container">
      <h2>Student Discount Applies To</h2>
      <p class="section-lead">Binding, laminating, BW/colour printing, reports, booklets, flyers, posters, certificates, and other student essentials.</p>
      <div class="student-cta-box">
        <p><strong>Ready to save?</strong> Join the club and we’ll email your membership card with your unique member number.</p>
        <a href="join.php" class="btn btn-blue">Join the Club</a>
      </div>
    </div>
  </section>

  <!-- Back to main site -->
  <section class="student-back">
    <div class="container">
      <a href="<?= $base_url ?>index.php" class="back-to-main">← Back to Paperboy JA Main Site</a>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
