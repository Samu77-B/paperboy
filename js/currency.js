(function () {
  'use strict';

  var cfg = window.PaperboyCurrencyConfig || {};
  var enabled = cfg.enabled || {};
  var selected = String(cfg.selected || cfg.base || 'jmd').toLowerCase();
  var listeners = [];
  var cookieDays = 180;

  function hasCurrency(code) {
    return Object.prototype.hasOwnProperty.call(enabled, String(code || '').toLowerCase());
  }

  function readStored() {
    try {
      var stored = String(localStorage.getItem('pb_currency') || '').toLowerCase();
      if (hasCurrency(stored)) return stored;
    } catch (e) {}
    return '';
  }

  function writeCookie(code) {
    var expires = new Date(Date.now() + cookieDays * 24 * 60 * 60 * 1000).toUTCString();
    document.cookie = 'pb_currency=' + encodeURIComponent(code) + '; expires=' + expires + '; path=/; SameSite=Lax';
  }

  function persist(code) {
    try {
      localStorage.setItem('pb_currency', code);
    } catch (e) {}
    writeCookie(code);
  }

  function convert(amount, from, to) {
    var src = String(from || cfg.base || 'jmd').toLowerCase();
    var dest = String(to || selected).toLowerCase();
    var n = Number(amount) || 0;
    if (src === dest) return n;
    var fromMeta = enabled[src];
    var toMeta = enabled[dest];
    var fromRate = fromMeta && Number(fromMeta.rate);
    var toRate = toMeta && Number(toMeta.rate);
    if (!fromRate || !toRate) return n;
    return (n * fromRate) / toRate;
  }

  function formatAmount(amount, currency) {
    var code = String(currency || selected).toLowerCase();
    var meta = enabled[code] || { symbol: code.toUpperCase() + ' ', decimals: 2 };
    var decimals = Number(meta.decimals) || 0;
    var rounded = decimals === 0 ? Math.round(amount) : Math.round(amount * Math.pow(10, decimals)) / Math.pow(10, decimals);
    var whole = decimals === 0 || Math.abs(rounded - Math.round(rounded)) < 0.00001;
    return (meta.symbol || '') + rounded.toLocaleString('en-JM', {
      minimumFractionDigits: whole ? 0 : decimals,
      maximumFractionDigits: whole ? 0 : decimals
    });
  }

  function format(amount, from) {
    return formatAmount(convert(amount, from), selected);
  }

  function formatMinor(minor, from) {
    return format((Number(minor) || 0) / 100, from);
  }

  function paintMarked() {
    var nodes = document.querySelectorAll('[data-money-minor], [data-money-major]');
    for (var i = 0; i < nodes.length; i++) {
      var el = nodes[i];
      var from = el.getAttribute('data-money-from') || cfg.base || 'jmd';
      if (el.hasAttribute('data-money-minor')) {
        el.textContent = formatMinor(el.getAttribute('data-money-minor'), from);
      } else {
        el.textContent = format(el.getAttribute('data-money-major'), from);
      }
    }
    var notes = document.querySelectorAll('.shop-currency-note[data-store-currency]');
    for (var n = 0; n < notes.length; n++) {
      notes[n].hidden = String(notes[n].getAttribute('data-store-currency') || '').toLowerCase() === selected;
    }
  }

  function setSelects(code) {
    var selects = document.querySelectorAll('.nav-currency-select');
    for (var i = 0; i < selects.length; i++) {
      if (selects[i].value !== code) selects[i].value = code;
    }
  }

  function set(code) {
    code = String(code || '').toLowerCase();
    if (!hasCurrency(code) || code === selected) {
      setSelects(selected);
      return;
    }
    selected = code;
    persist(code);
    setSelects(code);
    paintMarked();
    for (var i = 0; i < listeners.length; i++) {
      try {
        listeners[i](code);
      } catch (e) {}
    }
    document.dispatchEvent(new CustomEvent('paperboy:currency', { detail: { currency: code } }));
  }

  var stored = readStored();
  if (stored) {
    selected = stored;
    writeCookie(stored);
  } else {
    persist(selected);
  }

  window.PaperboyCurrency = {
    convert: convert,
    format: format,
    formatMinor: formatMinor,
    selected: function () {
      return selected;
    },
    set: set,
    onChange: function (fn) {
      if (typeof fn === 'function') listeners.push(fn);
    }
  };

  function boot() {
    setSelects(selected);
    paintMarked();
    document.addEventListener('change', function (event) {
      var target = event.target;
      if (!target || !target.classList || !target.classList.contains('nav-currency-select')) return;
      set(target.value);
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
