(function () {
  'use strict';

  var cfg = window.PaperboyPrint;
  if (!cfg) {
    console.warn('PaperboyPrint pricing config missing');
    return;
  }

  function money(amount) {
    if (window.PaperboyCurrency) {
      return window.PaperboyCurrency.format(amount, 'jmd');
    }
    var n = Math.round(Number(amount) * 100) / 100;
    var formatted = n.toLocaleString('en-JM', {
      minimumFractionDigits: n % 1 === 0 ? 0 : 2,
      maximumFractionDigits: 2
    });
    return (cfg.currency || 'J$') + formatted;
  }

  function rateFor(size, type) {
    var row = cfg.rates && cfg.rates[size];
    if (!row) return 0;
    return Number(type === 'colour' ? row.colour : row.bw) || 0;
  }

  function typeLabel(type) {
    return type === 'colour' ? 'Colour' : 'Black & white';
  }

  function lineTotal(pages, size, type) {
    return pages * rateFor(size, type);
  }

  function cartConfigured() {
    return Boolean(cfg.paysynkProduct);
  }

  function initRoot(root) {
    if (!root || root.getAttribute('data-print-ready') === '1') return;
    root.setAttribute('data-print-ready', '1');
    root.hidden = false;

    var isStudent = root.getAttribute('data-student') === 'true';
    var discount = isStudent ? Number(cfg.studentDiscount) || 0 : 0;
    var form = root.querySelector('.print-line-form');
    var sizeSelect = root.querySelector('select[name="size"]');
    var pagesInput = root.querySelector('input[name="pages"]');
    var preview = root.querySelector('.print-line-preview');
    var orderList = root.querySelector('.print-order-list');
    var orderEmpty = root.querySelector('.print-order-empty');
    var summary = root.querySelector('.print-order-summary');
    var subtotalRow = root.querySelector('.print-subtotal-row');
    var discountRow = root.querySelector('.print-discount-row');
    var subtotalValue = root.querySelector('.print-subtotal-value');
    var discountValue = root.querySelector('.print-discount-value');
    var totalValue = root.querySelector('.print-total-value');
    var addCartBtn = root.querySelector('.print-add-cart');
    var cartStatus = root.querySelector('.print-cart-status');

    var lines = [];

    if (sizeSelect.options.length === 0 && cfg.sizes && cfg.sizes.length) {
      cfg.sizes.forEach(function (size) {
        var opt = document.createElement('option');
        opt.value = size;
        opt.textContent = size;
        sizeSelect.appendChild(opt);
      });
    }

    function selectedType() {
      var el = form.querySelector('input[name="printType"]:checked');
      return el ? el.value : 'bw';
    }

    function updatePreview() {
      var pages = Math.max(1, parseInt(pagesInput.value, 10) || 0);
      var size = sizeSelect.value;
      var type = selectedType();
      var unit = rateFor(size, type);
      var total = lineTotal(pages, size, type);
      preview.textContent =
        pages +
        (pages === 1 ? ' page' : ' pages') +
        ' · ' +
        size +
        ' · ' +
        typeLabel(type) +
        ' @ ' +
        money(unit) +
        '/page = ' +
        money(total);
    }

    function renderOrder() {
      orderList.innerHTML = '';
      if (!lines.length) {
        orderEmpty.hidden = false;
        summary.hidden = true;
        return;
      }
      orderEmpty.hidden = true;
      summary.hidden = false;

      var subtotal = 0;
      lines.forEach(function (line, index) {
        subtotal += line.amount;
        var li = document.createElement('li');
        li.className = 'print-order-item';
        li.innerHTML =
          '<div class="print-order-item-main">' +
          '<span class="print-order-item-label"></span>' +
          '<span class="print-order-item-price"></span>' +
          '</div>' +
          '<button type="button" class="print-order-remove" aria-label="Remove line">Remove</button>';
        li.querySelector('.print-order-item-label').textContent =
          line.pages +
          (line.pages === 1 ? ' page' : ' pages') +
          ' · ' +
          line.size +
          ' · ' +
          typeLabel(line.type);
        li.querySelector('.print-order-item-price').textContent = money(line.amount);
        li.querySelector('.print-order-remove').addEventListener('click', function () {
          lines.splice(index, 1);
          renderOrder();
          setStatus('');
        });
        orderList.appendChild(li);
      });

      var discountAmt = Math.round(subtotal * discount * 100) / 100;
      var total = Math.round((subtotal - discountAmt) * 100) / 100;

      if (discount > 0) {
        subtotalRow.hidden = false;
        discountRow.hidden = false;
        subtotalValue.textContent = money(subtotal);
        discountValue.textContent = '−' + money(discountAmt);
      } else {
        subtotalRow.hidden = true;
        discountRow.hidden = true;
      }
      totalValue.textContent = money(total);

      var configured = cartConfigured();
      addCartBtn.disabled = !configured;
      if (!configured) {
        setStatus('Cart checkout is not configured yet. Set the PaySynk product in print-pricing.js after creating the document printing product.');
      }
    }

    function setStatus(msg, isError) {
      cartStatus.textContent = msg || '';
      cartStatus.classList.toggle('is-error', !!isError);
    }

    form.addEventListener('input', updatePreview);
    form.addEventListener('change', updatePreview);
    document.addEventListener('paperboy:currency', function () {
      updatePreview();
      renderOrder();
    });

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var pages = parseInt(pagesInput.value, 10);
      if (!pages || pages < 1) {
        pagesInput.focus();
        return;
      }
      var size = sizeSelect.value;
      var type = selectedType();
      lines.push({
        pages: pages,
        size: size,
        type: type,
        amount: lineTotal(pages, size, type)
      });
      renderOrder();
      setStatus('');
      pagesInput.value = '1';
      updatePreview();
      pagesInput.focus();
    });

    addCartBtn.addEventListener('click', function () {
      if (!lines.length) return;
      if (!cartConfigured()) {
        setStatus('Set paysynkProduct in print-pricing.js after creating the PaySynk product.', true);
        return;
      }

      setStatus('Document printing checkout will be wired once the PaySynk product is in place.', true);
    });

    updatePreview();
    renderOrder();
  }

  function boot() {
    document.querySelectorAll('.print-configurator').forEach(initRoot);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
