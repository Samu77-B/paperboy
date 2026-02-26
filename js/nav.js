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
