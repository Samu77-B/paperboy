<?php
$page_title = 'Student document printing';
$page_description = 'Build a mixed black & white and colour print order with Student Club pricing — 15% off at Paperboy JA.';
$page_url = 'student-printing/print.php';
$current_page = 'student-print';
$depth = 1;
$student_section = true;
$print_is_student = true;

$base_url = '../';
include __DIR__ . '/../includes/head.php';
include __DIR__ . '/../includes/nav-student.php';
?>

  <section class="student-page-banner">
    <div class="container">
      <h1>Document printing</h1>
      <p>Mix sizes and colour or black &amp; white — Student Club 15% off</p>
    </div>
  </section>

  <section class="product-content">
    <div class="container">
      <a href="index.php" class="back-link">/ BACK</a>

      <?php include __DIR__ . '/../includes/print-configurator.php'; ?>

      <div class="quote-cta">
        <h3>Need binding or a custom job?</h3>
        <p>Use your member number at checkout. For finishing or complex specs, request a quote.</p>
        <a href="<?= $base_url ?>request-a-quote.php?product=Student%20printing" class="btn btn-blue">Request a Quote</a>
        <a href="member-area.php" class="btn btn-dark" style="margin-left:0.5rem">Member area</a>
      </div>
    </div>
  </section>

<?php
$page_scripts = [
  $base_url . 'js/print-pricing.js',
  $base_url . 'js/print-configurator.js',
];
include __DIR__ . '/../includes/footer.php';
?>
