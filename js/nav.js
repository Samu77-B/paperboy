document.addEventListener('DOMContentLoaded', function() {
  var searchToggle = document.getElementById('searchToggle');
  var searchOverlay = document.getElementById('searchOverlay');
  var searchClose = document.getElementById('searchClose');
  var mobileToggle = document.getElementById('mobileToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var megaMenu = document.getElementById('megaMenu');
  var dropdown = document.querySelector('.nav-dropdown');
  var dropdownTrigger = document.querySelector('.dropdown-trigger');

  if (searchToggle) {
    searchToggle.addEventListener('click', function() {
      searchOverlay.classList.add('active');
    });
  }

  if (searchClose) {
    searchClose.addEventListener('click', function() {
      searchOverlay.classList.remove('active');
    });
  }

  if (searchOverlay) {
    searchOverlay.addEventListener('click', function(e) {
      if (e.target === searchOverlay) searchOverlay.classList.remove('active');
    });
  }

  if (mobileToggle && mobileMenu) {
    mobileToggle.addEventListener('click', function() {
      mobileToggle.classList.toggle('active');
      mobileMenu.classList.toggle('active');
    });
  }

  document.querySelectorAll('.mobile-dropdown-trigger').forEach(function(trigger) {
    trigger.addEventListener('click', function() {
      var submenu = this.nextElementSibling;
      if (submenu) submenu.classList.toggle('active');
    });
  });

  var cartBtn = document.getElementById('paysynkCartBtn');
  var cartCountEl = document.getElementById('paysynkCartCount');
  var cartStore = (cartBtn && cartBtn.getAttribute('data-paysynk-store')) || 'paperboy-ja';

  function cartItemCount() {
    try {
      var raw = localStorage.getItem('paysynk-cart:' + cartStore);
      var items = raw ? JSON.parse(raw) : [];
      var n = 0;
      for (var i = 0; i < items.length; i++) n += items[i].quantity || 0;
      return n;
    } catch (e) {
      return 0;
    }
  }

  function refreshCartCount() {
    if (!cartCountEl) return;
    var n = cartItemCount();
    if (n > 0) {
      cartCountEl.hidden = false;
      cartCountEl.textContent = String(n);
    } else {
      cartCountEl.hidden = true;
    }
  }

  if (cartBtn) {
    cartBtn.addEventListener('click', function() {
      if (window.PaySynkCart && typeof window.PaySynkCart.open === 'function') {
        window.PaySynkCart.open(cartStore);
      }
    });
  }

  refreshCartCount();
  window.addEventListener('paysynk:cart-updated', refreshCartCount);
  window.addEventListener('storage', function(e) {
    if (e.key === 'paysynk-cart:' + cartStore) refreshCartCount();
  });

  if (dropdown && megaMenu && dropdownTrigger) {
    var menuOpen = false;

    dropdownTrigger.addEventListener('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      menuOpen = !menuOpen;
      megaMenu.classList.toggle('active', menuOpen);
    });

    megaMenu.addEventListener('click', function(e) {
      e.stopPropagation();
    });

    document.addEventListener('click', function(e) {
      if (menuOpen && !dropdown.contains(e.target)) {
        megaMenu.classList.remove('active');
        menuOpen = false;
      }
    });
  }
});
