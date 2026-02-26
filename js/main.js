document.addEventListener('DOMContentLoaded', function() {
  var yearEl = document.getElementById('copyright-year');
  if (yearEl) yearEl.textContent = new Date().getFullYear();
});

window.addEventListener('load', function() {
  if (typeof xSearch !== 'undefined') {
    xSearch("id=my-search-64309912-inline");
  }
});
