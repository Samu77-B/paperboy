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
              <div class="mega-menu-col">
                <h3 class="mega-menu-title">Business Products</h3>
                <a href="<?= $base_url ?>materials.php" class="mega-menu-link materials-link">Materials</a>
                <a href="<?= $base_url ?>business-products/bw-colour-printing.php" class="mega-menu-link">BW/Colour Printing</a>
                <a href="<?= $base_url ?>business-products/scanning.php" class="mega-menu-link">Scanning</a>
                <a href="<?= $base_url ?>business-products/business-cards.php" class="mega-menu-link">Business Cards</a>
                <a href="<?= $base_url ?>business-products/booklets.php" class="mega-menu-link">Booklets</a>
                <a href="<?= $base_url ?>business-products/labels.php" class="mega-menu-link">Labels</a>
                <a href="<?= $base_url ?>business-products/reports.php" class="mega-menu-link">Reports</a>
                <a href="<?= $base_url ?>business-products/manuals.php" class="mega-menu-link">Manuals</a>
                <a href="<?= $base_url ?>business-products/menus.php" class="mega-menu-link">Menus</a>
                <a href="<?= $base_url ?>business-products/press-kits.php" class="mega-menu-link">Press Kits</a>
                <a href="<?= $base_url ?>business-products/letterheads.php" class="mega-menu-link">Letterheads</a>
                <a href="<?= $base_url ?>business-products/envelopes.php" class="mega-menu-link">Envelopes</a>
                <a href="<?= $base_url ?>business-products/architectural-plans.php" class="mega-menu-link">Architectural Drawings</a>
                <a href="<?= $base_url ?>business-products/receipt-books.php" class="mega-menu-link">Receipt Books</a>
                <a href="<?= $base_url ?>business-products/compliment-slips.php" class="mega-menu-link">Comp Slips</a>
              </div>
              <div class="mega-menu-col">
                <h3 class="mega-menu-title">Marketing Material</h3>
                <a href="<?= $base_url ?>marketing-products/brochures.php" class="mega-menu-link">Brochures</a>
                <a href="<?= $base_url ?>marketing-products/calendars.php" class="mega-menu-link">Calendars</a>
                <a href="<?= $base_url ?>marketing-products/catalogues.php" class="mega-menu-link">Catalogues</a>
                <a href="<?= $base_url ?>marketing-products/flyers.php" class="mega-menu-link">Flyers</a>
                <a href="<?= $base_url ?>marketing-products/magazines.php" class="mega-menu-link">Magazines</a>
                <a href="<?= $base_url ?>business-products/newsletters.php" class="mega-menu-link">Newsletters</a>
                <a href="<?= $base_url ?>marketing-products/standee-display.php" class="mega-menu-link">Standees</a>
                <a href="<?= $base_url ?>marketing-products/easel-backs.php" class="mega-menu-link">Easel Backs</a>
                <a href="<?= $base_url ?>marketing-products/tent-cards.php" class="mega-menu-link">Tent Cards</a>
              </div>
              <div class="mega-menu-col">
                <h3 class="mega-menu-title">Events &amp; More</h3>
                <a href="<?= $base_url ?>event-materials/invitations-certificates.php" class="mega-menu-link">Certificates</a>
                <a href="<?= $base_url ?>event-materials/event-tickets.php" class="mega-menu-link">Event Tickets</a>
                <a href="<?= $base_url ?>event-materials/invitations.php" class="mega-menu-link">Invitations</a>
                <a href="<?= $base_url ?>event-materials/gift-certificates.php" class="mega-menu-link">Gift Certificates</a>
                <a href="<?= $base_url ?>event-materials/greetings-cards.php" class="mega-menu-link">Greeting Cards</a>
                <a href="<?= $base_url ?>event-materials/armbands.php" class="mega-menu-link">Wristbands</a>
                <a href="<?= $base_url ?>event-materials/programs.php" class="mega-menu-link">Programs</a>
                <a href="<?= $base_url ?>event-materials/sporting-bibs.php" class="mega-menu-link">Sporting Bibs</a>
              </div>
              <div class="mega-menu-col">
                <h3 class="mega-menu-title">Signs &amp; Printing</h3>
                <a href="<?= $base_url ?>signs-banners/retractable-banners.php" class="mega-menu-link">Retractable Banners</a>
                <a href="<?= $base_url ?>signs-banners/hanging-banners.php" class="mega-menu-link">Hanging Banners</a>
                <a href="<?= $base_url ?>signs-banners/x-banner-stand.php" class="mega-menu-link">X Banner Stand</a>
                <a href="<?= $base_url ?>signs-banners/outdoor-banners-stands.php" class="mega-menu-link">Outdoor Banners</a>
                <a href="<?= $base_url ?>photo-printing/photo-prints.php" class="mega-menu-link">Photo Prints</a>
                <a href="<?= $base_url ?>photo-printing/posters.php" class="mega-menu-link">Posters</a>
                <a href="<?= $base_url ?>photo-printing/canvas-printing.php" class="mega-menu-link">Canvas Printing</a>
              </div>
              <div class="mega-menu-col">
                <h3 class="mega-menu-title">ID &amp; Accessories</h3>
                <a href="<?= $base_url ?>identification-cards/pvc-cards.php" class="mega-menu-link">PVC ID Cards</a>
                <a href="<?= $base_url ?>identification-cards/composite-cards.php" class="mega-menu-link">Composite ID Cards</a>
                <a href="<?= $base_url ?>identification-cards/loyalty-cards.php" class="mega-menu-link">Loyalty Cards</a>
                <a href="<?= $base_url ?>accessories/business-card-boxes.php" class="mega-menu-link">Business Card Boxes</a>
                <a href="<?= $base_url ?>accessories/binding.php" class="mega-menu-link">Binding</a>
                <a href="<?= $base_url ?>accessories/lamination.php" class="mega-menu-link">Lamination</a>
                <a href="<?= $base_url ?>accessories/mailing-tubes.php" class="mega-menu-link">Mailing Tubes</a>
                <a href="<?= $base_url ?>accessories/lanyards.php" class="mega-menu-link">Lanyards</a>
                <a href="<?= $base_url ?>accessories/pouches.php" class="mega-menu-link">Pouches</a>
                <a href="<?= $base_url ?>accessories/retrackable-clips.php" class="mega-menu-link">Retractable Clips</a>
              </div>
            </div>
            <div class="mega-menu-featured">
              <a href="<?= $base_url ?>artists.php" class="mega-menu-featured-link">
                <span>Discover Jamaica's Artists &amp; Photographers</span>
              </a>
            </div>
          </div>
        </div>
        
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
          <div class="ec-cart-widget"></div>
        </div>
        <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle menu" aria-expanded="false">
          <span></span><span></span><span></span>
        </button>
      </div>
    </div>

    <div class="search-overlay" id="searchOverlay">
      <div class="search-overlay-box">
        <button class="search-close" id="searchClose" aria-label="Close search">&times;</button>
        <div id="my-search-64309912"></div>
      </div>
    </div>

    <div class="mobile-menu" id="mobileMenu">
      <a href="<?= $base_url ?>index.php" class="mobile-menu-link">Home</a>
      <div>
        <button class="mobile-menu-link mobile-dropdown-trigger">Services</button>
        <div class="mobile-submenu">
          <span class="mobile-submenu-heading">Business Products</span>
          <a href="<?= $base_url ?>materials.php" class="mobile-submenu-link">Materials</a>
          <a href="<?= $base_url ?>business-products/bw-colour-printing.php" class="mobile-submenu-link">BW/Colour Printing</a>
          <a href="<?= $base_url ?>business-products/scanning.php" class="mobile-submenu-link">Scanning</a>
          <a href="<?= $base_url ?>business-products/business-cards.php" class="mobile-submenu-link">Business Cards</a>
          <a href="<?= $base_url ?>business-products/booklets.php" class="mobile-submenu-link">Booklets</a>
          <a href="<?= $base_url ?>business-products/labels.php" class="mobile-submenu-link">Labels</a>
          <a href="<?= $base_url ?>business-products/reports.php" class="mobile-submenu-link">Reports</a>
          <a href="<?= $base_url ?>business-products/manuals.php" class="mobile-submenu-link">Manuals</a>
          <a href="<?= $base_url ?>business-products/menus.php" class="mobile-submenu-link">Menus</a>
          <a href="<?= $base_url ?>business-products/press-kits.php" class="mobile-submenu-link">Press Kits</a>
          <a href="<?= $base_url ?>business-products/letterheads.php" class="mobile-submenu-link">Letterheads</a>
          <a href="<?= $base_url ?>business-products/envelopes.php" class="mobile-submenu-link">Envelopes</a>
          <a href="<?= $base_url ?>business-products/architectural-plans.php" class="mobile-submenu-link">Architectural Drawings</a>
          <a href="<?= $base_url ?>business-products/receipt-books.php" class="mobile-submenu-link">Receipt Books</a>
          <a href="<?= $base_url ?>business-products/compliment-slips.php" class="mobile-submenu-link">Comp Slips</a>
          <span class="mobile-submenu-heading">Marketing Material</span>
          <a href="<?= $base_url ?>marketing-products/brochures.php" class="mobile-submenu-link">Brochures</a>
          <a href="<?= $base_url ?>marketing-products/calendars.php" class="mobile-submenu-link">Calendars</a>
          <a href="<?= $base_url ?>marketing-products/catalogues.php" class="mobile-submenu-link">Catalogues</a>
          <a href="<?= $base_url ?>marketing-products/flyers.php" class="mobile-submenu-link">Flyers</a>
          <a href="<?= $base_url ?>marketing-products/magazines.php" class="mobile-submenu-link">Magazines</a>
          <a href="<?= $base_url ?>business-products/newsletters.php" class="mobile-submenu-link">Newsletters</a>
          <a href="<?= $base_url ?>marketing-products/standee-display.php" class="mobile-submenu-link">Standees</a>
          <a href="<?= $base_url ?>marketing-products/easel-backs.php" class="mobile-submenu-link">Easel Backs</a>
          <a href="<?= $base_url ?>marketing-products/tent-cards.php" class="mobile-submenu-link">Tent Cards</a>
          <span class="mobile-submenu-heading">Events &amp; More</span>
          <a href="<?= $base_url ?>event-materials/invitations-certificates.php" class="mobile-submenu-link">Certificates</a>
          <a href="<?= $base_url ?>event-materials/event-tickets.php" class="mobile-submenu-link">Event Tickets</a>
          <a href="<?= $base_url ?>event-materials/invitations.php" class="mobile-submenu-link">Invitations</a>
          <a href="<?= $base_url ?>event-materials/gift-certificates.php" class="mobile-submenu-link">Gift Certificates</a>
          <a href="<?= $base_url ?>event-materials/greetings-cards.php" class="mobile-submenu-link">Greeting Cards</a>
          <a href="<?= $base_url ?>event-materials/armbands.php" class="mobile-submenu-link">Wristbands</a>
          <a href="<?= $base_url ?>event-materials/programs.php" class="mobile-submenu-link">Programs</a>
          <a href="<?= $base_url ?>event-materials/sporting-bibs.php" class="mobile-submenu-link">Sporting Bibs</a>
          <span class="mobile-submenu-heading">Signs &amp; Printing</span>
          <a href="<?= $base_url ?>signs-banners/retractable-banners.php" class="mobile-submenu-link">Retractable Banners</a>
          <a href="<?= $base_url ?>signs-banners/hanging-banners.php" class="mobile-submenu-link">Hanging Banners</a>
          <a href="<?= $base_url ?>signs-banners/x-banner-stand.php" class="mobile-submenu-link">X Banner Stand</a>
          <a href="<?= $base_url ?>signs-banners/outdoor-banners-stands.php" class="mobile-submenu-link">Outdoor Banners</a>
          <a href="<?= $base_url ?>photo-printing/photo-prints.php" class="mobile-submenu-link">Photo Prints</a>
          <a href="<?= $base_url ?>photo-printing/posters.php" class="mobile-submenu-link">Posters</a>
          <a href="<?= $base_url ?>photo-printing/canvas-printing.php" class="mobile-submenu-link">Canvas Printing</a>
          <span class="mobile-submenu-heading">ID &amp; Accessories</span>
          <a href="<?= $base_url ?>identification-cards/pvc-cards.php" class="mobile-submenu-link">PVC ID Cards</a>
          <a href="<?= $base_url ?>identification-cards/composite-cards.php" class="mobile-submenu-link">Composite ID Cards</a>
          <a href="<?= $base_url ?>identification-cards/loyalty-cards.php" class="mobile-submenu-link">Loyalty Cards</a>
          <a href="<?= $base_url ?>accessories/business-card-boxes.php" class="mobile-submenu-link">Business Card Boxes</a>
          <a href="<?= $base_url ?>accessories/binding.php" class="mobile-submenu-link">Binding</a>
          <a href="<?= $base_url ?>accessories/lamination.php" class="mobile-submenu-link">Lamination</a>
          <a href="<?= $base_url ?>accessories/mailing-tubes.php" class="mobile-submenu-link">Mailing Tubes</a>
          <a href="<?= $base_url ?>accessories/lanyards.php" class="mobile-submenu-link">Lanyards</a>
          <a href="<?= $base_url ?>accessories/pouches.php" class="mobile-submenu-link">Pouches</a>
          <a href="<?= $base_url ?>accessories/retrackable-clips.php" class="mobile-submenu-link">Retractable Clips</a>
        </div>
      </div>
      <a href="<?= $base_url ?>contact.php" class="mobile-menu-link">Contact</a>
      <a href="<?= $base_url ?>templates/templates.php" class="mobile-menu-link">Templates</a>
      <a href="<?= $base_url ?>jobs.php" class="mobile-menu-link">Jobs</a>
      <a href="<?= $base_url ?>support.php" class="mobile-menu-link">Support</a>
      <a href="<?= $base_url ?>artists.php" class="mobile-menu-link mobile-menu-featured">Discover Jamaica's Artists &amp; Photographers</a>
    </div>
  </header>

  <!-- Ecwid -->
  <script data-cfasync="false" src="https://app.ecwid.com/script.js?64309912&data_platform=code&data_date=2021-08-11" charset="utf-8"></script>
  <script>Ecwid.init(); xSearch("id=my-search-64309912");</script>
