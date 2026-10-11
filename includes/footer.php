  <footer class="site-footer">
    <div class="container">
      <div class="footer-grid">
        <div>
          <a href="https://paperboyja.com/2019_artwork_guidelines_.pdf" class="footer-link">Design Printing Guides</a>
          <a href="<?= $base_url ?>contact.php" class="footer-link">Contact</a>
          <a href="<?= $base_url ?>terms-and-conditions.php" class="footer-link">Terms and Conditions</a>
          <a href="<?= $base_url ?>terms-of-supply.php" class="footer-link">Terms of Supply</a>
          <a href="https://www.paperboyja.com/ExhibitorsCat_2023.pdf" target="_blank" rel="noopener" class="footer-link">Exhibitors Catalogue</a>
          <a href="<?= $base_url ?>privacy-policy.php" class="footer-link">Privacy Policy</a>
          <a href="<?= $base_url ?>cookie-policy.php" class="footer-link">Cookie Policy</a>
          <a href="<?= $base_url ?>jobs.php" class="footer-link">Jobs</a>
          <a href="#" class="footer-link">FAQ</a>
        </div>
        <div>
          <p class="footer-copy">Copyright <span id="copyright-year"></span> Paperboy JA</p>
          <p class="footer-credit">Website by <a href="https://paradigmstudio.net" target="_blank" rel="noopener">paradigmstudio.net</a> and Ecom by <a href="https://www.paysynk.com" target="_blank" rel="noopener">PaySynk</a></p>
        </div>
        <div class="footer-social">
          <a href="https://www.instagram.com/paperboyja/" target="_blank" rel="noopener" aria-label="Instagram">
            <img src="<?= $base_url ?>images/instagram.png" alt="Instagram" loading="lazy">
          </a>
          <a href="https://www.facebook.com/paperboyJA/" target="_blank" rel="noopener" aria-label="Facebook">
            <img src="<?= $base_url ?>images/facebook.png" alt="Facebook" loading="lazy">
          </a>
          <a href="https://wa.me/18765918676" aria-label="WhatsApp">
            <img src="<?= $base_url ?>images/WhatsApp3.png" alt="WhatsApp" loading="lazy">
          </a>
        </div>
      </div>
    </div>
  </footer>

  <?php
  if (!function_exists('paysynk_cart_script')) {
    require_once __DIR__ . '/paysynk.php';
  }
  paysynk_cart_script();
  if (!empty($paysynk_load_embed) || !empty($paysynk_product) || !empty($paysynk_embed)) {
    paysynk_embed_script();
  }
  ?>
  <script src="<?= $base_url ?>js/nav.js"></script>
  <script src="<?= $base_url ?>js/main.js"></script>
  <?php if (!empty($page_scripts) && is_array($page_scripts)): ?>
    <?php foreach ($page_scripts as $script_src): ?>
  <script src="<?= htmlspecialchars($script_src) ?>"></script>
    <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>
