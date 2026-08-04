<?php
$base_url = (isset($depth) && $depth > 0) ? str_repeat('../', $depth) : '';
?>
  <header class="site-header student-header">
    <div class="nav-container">
      <div class="nav-logo">
        <a href="<?= $base_url ?>index.php" title="Paperboy JA Main Site">
          <img src="<?= $base_url ?>images/PBJA_logo.svg" alt="Paperboy JA Logo" loading="lazy">
        </a>
        <span class="student-nav-label">Student Printing</span>
      </div>

      <nav class="nav-menu">
        <a href="index.php" class="nav-link<?= ($current_page ?? '') === 'student-printing' ? ' active' : '' ?>">Home</a>
        <a href="print.php" class="nav-link<?= ($current_page ?? '') === 'student-print' ? ' active' : '' ?>">Print</a>
        <a href="member-area.php" class="nav-link nav-link-member<?= ($current_page ?? '') === 'student-member' ? ' active' : '' ?>">Member area</a>
        <a href="join.php" class="nav-link highlight<?= ($current_page ?? '') === 'student-join' ? ' active' : '' ?>">Join the Club</a>
        <a href="<?= $base_url ?>contact.php" class="nav-link">Contact</a>
        <a href="<?= $base_url ?>index.php" class="nav-link student-back-link">Main Site</a>
      </nav>

      <div class="nav-right">
        <div class="nav-cart">
          <div class="ec-cart-widget"></div>
        </div>
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="index.php" class="mobile-menu-link">Student Printing Home</a>
      <a href="print.php" class="mobile-menu-link">Document printing</a>
      <a href="member-area.php" class="mobile-menu-link mobile-menu-member">Student Club · Member area</a>
      <a href="join.php" class="mobile-menu-link mobile-menu-featured">Join the Club</a>
      <a href="<?= $base_url ?>contact.php" class="mobile-menu-link">Contact</a>
      <a href="<?= $base_url ?>index.php" class="mobile-menu-link">Back to Main Site</a>
    </div>
  </header>

  <!-- Ecwid (cart + checkout for Student Club shopping) -->
  <script data-cfasync="false" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
  <script>Ecwid.init();</script>

  <script src="<?= $base_url ?>js/nav.js"></script>
