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
          <button type="button" class="nav-cart-btn" id="paysynkCartBtn" data-paysynk-store="<?= htmlspecialchars(PAYSYNK_STORE, ENT_QUOTES, 'UTF-8') ?>" aria-label="Open cart">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" aria-hidden="true">
              <path d="M6 7h15l-1.5 9h-12L6 7z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
              <path d="M6 7L5 4H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              <circle cx="9" cy="20" r="1.5" fill="currentColor"/>
              <circle cx="18" cy="20" r="1.5" fill="currentColor"/>
            </svg>
            <span class="nav-cart-count" id="paysynkCartCount" hidden>0</span>
          </button>
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

  <script src="<?= $base_url ?>js/nav.js"></script>
