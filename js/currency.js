(function () {
  'use strict';

  var cfg = window.PaperboyCurrencyConfig || {};
  var enabled = cfg.enabled || {};
  var display = Array.isArray(cfg.display) && cfg.display.length
    ? cfg.display.map(function (code) { return String(code).toLowerCase(); })
    : Object.keys(enabled);

  function detectBrowserCurrency() {
    var langs = navigator.languages || [navigator.language || ''];
    var countryMap = cfg.countryMap || {};
    var languageMap = cfg.languageMap || {};
    for (var i = 0; i < langs.length; i++) {
      var parts = String(langs[i] || '').replace('_', '-').split('-');
      if (parts[1]) {
        var countryCode = parts[1].toUpperCase();
        if (countryMap[countryCode] && enabled[countryMap[countryCode]]) {
          return countryMap[countryCode];
        }
      }
      var lang = String(parts[0] || '').toLowerCase();
      if (languageMap[lang] && enabled[languageMap[lang]]) {
        return languageMap[lang];
      }
    }
    return '';
  }

  if (cfg.mode === 'geo') {
    var headerCurrency = cfg.geo && cfg.geo.source === 'header' ? String(cfg.geo.currency || '').toLowerCase() : '';
    var localCurrency = headerCurrency && enabled[headerCurrency]
      ? headerCurrency
      : (detectBrowserCurrency() || (cfg.geo && cfg.geo.currency) || cfg.base || 'jmd');
    display = enabled[localCurrency] ? [localCurrency] : [cfg.base || 'jmd'];
  }

  function convert(amount, from, to) {
    var src = String(from || cfg.base || 'jmd').toLowerCase();
    var dest = String(to || cfg.base || 'jmd').toLowerCase();
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
    var code = String(currency || cfg.base || 'jmd').toLowerCase();
    var meta = enabled[code] || { symbol: code.toUpperCase() + ' ', decimals: 2 };
    var decimals = Number(meta.decimals) || 0;
    var rounded = decimals === 0 ? Math.round(amount) : Math.round(amount * Math.pow(10, decimals)) / Math.pow(10, decimals);
    var whole = decimals === 0 || Math.abs(rounded - Math.round(rounded)) < 0.00001;
    return (meta.symbol || '') + rounded.toLocaleString('en-JM', {
      minimumFractionDigits: whole ? 0 : decimals,
      maximumFractionDigits: whole ? 0 : decimals
    });
  }

  function codes() {
    return display.length ? display : [cfg.base || 'jmd'];
  }

  function formatParts(amount, from) {
    return codes().map(function (code) {
      return formatAmount(convert(amount, from, code), code);
    });
  }

  function format(amount, from) {
    return formatParts(amount, from).join(' / ');
  }

  function formatMinor(minor, from) {
    return format((Number(minor) || 0) / 100, from);
  }

  function renderInto(el, parts) {
    if (!el) return;
    el.textContent = '';
    if (parts.length <= 1) {
      el.classList.remove('price-multi');
      el.textContent = parts[0] || '';
      return;
    }
    el.classList.add('price-multi');
    for (var i = 0; i < parts.length; i++) {
      var span = document.createElement('span');
      span.className = i === 0 ? 'price-multi-main' : 'price-multi-alt';
      span.textContent = parts[i];
      el.appendChild(span);
    }
  }

  function paintMarked() {
    var nodes = document.querySelectorAll('[data-money-minor], [data-money-major]');
    for (var i = 0; i < nodes.length; i++) {
      var el = nodes[i];
      var from = el.getAttribute('data-money-from') || cfg.base || 'jmd';
      var amount = el.hasAttribute('data-money-minor')
        ? (Number(el.getAttribute('data-money-minor')) || 0) / 100
        : Number(el.getAttribute('data-money-major')) || 0;
      renderInto(el, formatParts(amount, from));
    }
  }

  window.PaperboyCurrency = {
    convert: convert,
    format: format,
    formatMinor: formatMinor,
    formatParts: formatParts,
    renderInto: renderInto,
    display: function () {
      return codes().slice();
    }
  };

  function boot() {
    paintMarked();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
  } else {
    boot();
  }
})();
