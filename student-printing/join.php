<?php
$page_title = 'Join the Student Club';
$page_description = 'Join the Paperboy JA Student Club for $5/month and get 10% off student printing plus an electronic membership card with your unique member number.';
$page_url = 'student-printing/join.php';
$current_page = 'student-join';
$depth = 1;
$student_section = true;

$base_url = '../';
include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav-student.php';
?>

  <section class="student-page-banner">
    <div class="container">
      <h1>Join the Student Club</h1>
      <p>$5 per month · 10% off student printing · Electronic membership card</p>
    </div>
  </section>

  <section class="student-join-section">
    <div class="container">
      <div class="student-join-grid">
        <div class="student-join-form-wrap">
          <h2>Sign up</h2>
          <?php if (isset($_GET['error']) && $_GET['error'] === 'invalid'): ?>
          <p class="form-error">Please enter a valid name and email address.</p>
          <?php endif; ?>
          <p>We’ll email your membership card with a unique member number. Use it in-store or when ordering online for your 10% discount.</p>
          <form class="student-join-form" id="studentJoinForm" action="join-process.php" method="post">
            <label for="name">Full name</label>
            <input type="text" id="name" name="name" required placeholder="Your name">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="your@email.com">
            <label for="school">School / University (optional)</label>
            <input type="text" id="school" name="school" placeholder="e.g. UWI, UTech">
            <p class="form-note">Membership is $5/month. You can cancel anytime. By joining you agree to our terms.</p>
            <button type="submit" class="btn btn-gold btn-block">Join for $5/month</button>
          </form>
        </div>
        <div class="student-join-benefits">
          <h3>What you get</h3>
          <ul>
            <li><strong>Electronic membership card</strong> — Unique member number, sent to your email</li>
            <li><strong>10% discount</strong> — On all student-related products</li>
            <li><strong>$5/month</strong> — Cancel anytime</li>
          </ul>
          <div class="membership-card-preview">
            <div class="membership-card-mock">
              <div class="membership-card-header">Paperboy JA Student Club</div>
              <div class="membership-card-body">
                <div class="membership-card-name">Your Name</div>
                <div class="membership-card-number">Member # — — — — — —</div>
                <div class="membership-card-discount">10% OFF student printing</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="student-back">
    <div class="container">
      <a href="index.php" class="back-to-main">← Back to Student Printing</a>
    </div>
  </section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
