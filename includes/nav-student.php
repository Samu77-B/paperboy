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
        <a href="join.php" class="nav-link highlight<?= ($current_page ?? '') === 'student-join' ? ' active' : '' ?>">Join the Club</a>
        <a href="<?= $base_url ?>contact.php" class="nav-link">Contact</a>
        <a href="<?= $base_url ?>index.php" class="nav-link student-back-link">Main Site</a>
      </nav>

      <div class="nav-right">
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="index.php" class="mobile-menu-link">Student Printing Home</a>
      <a href="join.php" class="mobile-menu-link mobile-menu-featured">Join the Club</a>
      <a href="<?= $base_url ?>contact.php" class="mobile-menu-link">Contact</a>
      <a href="<?= $base_url ?>index.php" class="mobile-menu-link">Back to Main Site</a>
    </div>
  </header>

  <script src="<?= $base_url ?>js/nav.js"></script>
