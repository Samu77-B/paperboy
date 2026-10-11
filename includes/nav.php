  <header class="site-header">
    <div class="nav-container">
      <div class="nav-logo">
        <a href="<?= $base_url ?>index.php">
          <img src="<?= $base_url ?>images/PBJA_logo.svg" alt="Paperboy JA Logo" loading="lazy">
        </a>
      </div>

      <nav class="nav-menu">
        <a href="<?= $base_url ?>index.php" class="nav-link<?= ($current_page ?? '') === 'home' ? ' active' : '' ?>">Home</a>
        
        <div class="nav-dropdown">
          <button class="nav-link highlight dropdown-trigger">
            Services
            <svg class="dropdown-arrow" width="12" height="8" viewBox="0 0 12 8" fill="none">
              <path d="M1 1.5L6 6.5L11 1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </button>
          <div class="mega-menu" id="megaMenu">
            <div class="mega-menu-grid">
              <?php foreach (paysynk_catalog() as $group_title => $items): ?>
              <div class="mega-menu-col">
                <h3 class="mega-menu-title"><?= htmlspecialchars($group_title) ?></h3>
                <?php if ($group_title === 'Business Products'): ?>
                <a href="<?= $base_url ?>materials.php" class="mega-menu-link materials-link">Materials</a>
                <a href="<?= $base_url ?>products.php" class="mega-menu-link">All products</a>
                <?php endif; ?>
                <?php foreach ($items as $item): ?>
                <a href="<?= htmlspecialchars(paysynk_product_href($item['slug'], $base_url)) ?>" class="mega-menu-link"><?= htmlspecialchars($item['name']) ?></a>
                <?php endforeach; ?>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="mega-menu-featured">
              <a href="<?= $base_url ?>artists.php" class="mega-menu-featured-link">
                <span>Discover Jamaica's Artists &amp; Photographers</span>
              </a>
            </div>
          </div>
        </div>
        
        <a href="<?= $base_url ?>student-printing/index.php" class="nav-link<?= ($current_page ?? '') === 'student' ? ' active' : '' ?>">Student Printing</a>
        <a href="<?= $base_url ?>contact.php" class="nav-link<?= ($current_page ?? '') === 'contact' ? ' active' : '' ?>">Contact</a>
        <a href="<?= $base_url ?>templates/templates.php" class="nav-link<?= ($current_page ?? '') === 'templates' ? ' active' : '' ?>">Templates</a>
        <a href="<?= $base_url ?>jobs.php" class="nav-link<?= ($current_page ?? '') === 'jobs' ? ' active' : '' ?>">Jobs</a>
        <a href="<?= $base_url ?>support.php" class="nav-link<?= ($current_page ?? '') === 'support' ? ' active' : '' ?>">Support</a>
      </nav>

      <div class="nav-right">
        <button class="nav-search-btn" id="searchToggle" aria-label="Open search">
          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <path d="M9 17A8 8 0 1 0 9 1a8 8 0 0 0 0 16zM18 18l-4.35-4.35" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
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

    <div class="search-overlay" id="searchOverlay">
      <div class="search-overlay-box">
        <button class="search-close" id="searchClose" aria-label="Close search">&times;</button>
        <h2 class="search-overlay-title">Find a product</h2>
        <p class="search-overlay-copy">Open <strong>Services</strong> in the menu, choose a product, and add it to your cart from that page.</p>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="<?= $base_url ?>index.php" class="mobile-menu-link">Home</a>
      <div>
        <button class="mobile-menu-link mobile-dropdown-trigger">Services</button>
        <div class="mobile-submenu">
          <?php foreach (paysynk_catalog() as $group_title => $items): ?>
          <span class="mobile-submenu-heading"><?= htmlspecialchars($group_title) ?></span>
          <?php if ($group_title === 'Business Products'): ?>
          <a href="<?= $base_url ?>materials.php" class="mobile-submenu-link">Materials</a>
          <a href="<?= $base_url ?>products.php" class="mobile-submenu-link">All products</a>
          <?php endif; ?>
          <?php foreach ($items as $item): ?>
          <a href="<?= htmlspecialchars(paysynk_product_href($item['slug'], $base_url)) ?>" class="mobile-submenu-link"><?= htmlspecialchars($item['name']) ?></a>
          <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </div>
      <a href="<?= $base_url ?>student-printing/index.php" class="mobile-menu-link">Student Printing</a>
      <a href="<?= $base_url ?>contact.php" class="mobile-menu-link">Contact</a>
      <a href="<?= $base_url ?>templates/templates.php" class="mobile-menu-link">Templates</a>
      <a href="<?= $base_url ?>jobs.php" class="mobile-menu-link">Jobs</a>
      <a href="<?= $base_url ?>support.php" class="mobile-menu-link">Support</a>
      <a href="<?= $base_url ?>artists.php" class="mobile-menu-link mobile-menu-featured">Discover Jamaica's Artists &amp; Photographers</a>
    </div>
  </header>

