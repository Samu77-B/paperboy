(function () {
  'use strict';

  var root = document.querySelector('[data-paysynk-config]');
  if (!root) return;

  var dataEl = document.getElementById('paysynk-config-data');
  if (!dataEl) return;

  var payload;
  try {
    payload = JSON.parse(dataEl.textContent);
  } catch (e) {
    return;
  }

  var product = payload.product || {};
  var store = payload.store || {};
  var priceEl = root.querySelector('[data-ps-price]');
  var captionEl = root.querySelector('[data-ps-caption]');
  var form = root.querySelector('.shop-config-form');
  if (!form || !priceEl) return;

  function selectedMap() {
    var map = {};
    var selects = form.querySelectorAll('select[data-option-id]');
    for (var i = 0; i < selects.length; i++) {
      map[selects[i].getAttribute('data-option-id')] = selects[i].value;
    }
    return map;
  }

  function money(minor) {
    var amount = Math.round(Number(minor) || 0) / 100;
    var currency = String(store.currency || 'gbp').toLowerCase();
    var symbols = { gbp: '£', usd: '$', eur: '€', jmd: 'J$' };
    var symbol = symbols[currency] || currency.toUpperCase() + ' ';
    if (Math.abs(amount - Math.round(amount)) < 0.001) {
      return symbol + amount.toLocaleString('en-GB', { maximumFractionDigits: 0 });
    }
    return symbol + amount.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }

  function optionLabel(optionId, valueId) {
    var options = product.options || [];
    for (var i = 0; i < options.length; i++) {
      if (options[i].id !== optionId) continue;
      var values = options[i].values || [];
      for (var j = 0; j < values.length; j++) {
        if (values[j].id === valueId) return values[j].label || '';
      }
    }
    return '';
  }

  function priceMinor(selected) {
    var base = Number(product.basePriceMinor) || 0;
    var vars = product.variations || [];
    var matched = null;
    for (var i = 0; i < vars.length; i++) {
      var match = vars[i].match || {};
      var ok = true;
      var keys = Object.keys(match);
      for (var k = 0; k < keys.length; k++) {
        if (selected[keys[k]] !== match[keys[k]]) {
          ok = false;
          break;
        }
      }
      if (ok) matched = vars[i];
    }
    if (matched && typeof matched.priceMinor === 'number') {
      base = matched.priceMinor;
    }
    var options = product.options || [];
    for (var o = 0; o < options.length; o++) {
      var valId = selected[options[o].id];
      var values = options[o].values || [];
      for (var v = 0; v < values.length; v++) {
        if (values[v].id === valId && values[v].modifierKind === 'amount') {
          base += Number(values[v].modifierValue) || 0;
        }
      }
    }
    return base;
  }

  function caption(selected) {
    var options = product.options || [];
    var parts = [];
    for (var i = 0; i < options.length; i++) {
      var label = optionLabel(options[i].id, selected[options[i].id]);
      if (label) parts.push(label);
    }
    return parts.join(' · ');
  }

  function paint() {
    var selected = selectedMap();
    priceEl.textContent = money(priceMinor(selected));
    if (captionEl) captionEl.textContent = caption(selected);
  }

  form.addEventListener('change', paint);
  paint();
})();
