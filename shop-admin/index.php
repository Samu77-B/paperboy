<?php
require_once dirname(__DIR__) . '/includes/currencies.php';

session_name('pb_shop_admin');
session_start();

function shop_admin_csrf_token() {
  if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
  }
  return $_SESSION['csrf'];
}

function shop_admin_csrf_ok() {
  $sent = (string) ($_POST['csrf'] ?? '');
  return $sent !== '' && hash_equals((string) ($_SESSION['csrf'] ?? ''), $sent);
}

$admin = paperboy_admin_settings();
$has_password = !empty($admin['hash']);
$logged_in = !empty($_SESSION['shop_admin']);
$error = '';
$notice = '';

if (isset($_GET['logout'])) {
  $_SESSION = [];
  session_destroy();
  header('Location: index.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (!shop_admin_csrf_ok()) {
    $error = 'Your session expired. Refresh and try again.';
  } elseif (!$has_password && ($_POST['action'] ?? '') === 'setup') {
    $password = (string) ($_POST['password'] ?? '');
    $confirm = (string) ($_POST['confirm'] ?? '');
    if (strlen($password) < 8) {
      $error = 'Choose a password with at least 8 characters.';
    } elseif ($password !== $confirm) {
      $error = 'Those passwords do not match.';
    } elseif (!paperboy_save_admin_settings(['hash' => password_hash($password, PASSWORD_DEFAULT)])) {
      $error = 'Could not save the password. Check folder permissions on /data.';
    } else {
      $_SESSION['shop_admin'] = true;
      header('Location: index.php?setup=1');
      exit;
    }
  } elseif (!$logged_in && ($_POST['action'] ?? '') === 'login') {
    $password = (string) ($_POST['password'] ?? '');
    if ($has_password && password_verify($password, $admin['hash'])) {
      $_SESSION['shop_admin'] = true;
      header('Location: index.php');
      exit;
    }
    $error = 'That password is not correct.';
  } elseif ($logged_in && ($_POST['action'] ?? '') === 'save-rates') {
    $rates = $_POST['rates'] ?? [];
    if (!is_array($rates)) {
      $rates = [];
    }
    $slots = $_POST['slots'] ?? [];
    if (!is_array($slots)) {
      $slots = [];
    }
    $error = paperboy_save_currency_settings([
      'mode' => (string) ($_POST['mode'] ?? 'fixed'),
      'displayCount' => (int) ($_POST['displayCount'] ?? 1),
      'slots' => $slots,
      'enabled' => $slots,
      'rates' => $rates,
    ]);
    if ($error === '') {
      $notice = 'Saved. The store will use this currency display option right away.';
    }
  } elseif ($logged_in && ($_POST['action'] ?? '') === 'change-password') {
    $current = (string) ($_POST['current'] ?? '');
    $password = (string) ($_POST['password'] ?? '');
    $confirm = (string) ($_POST['confirm'] ?? '');
    if (!$has_password || !password_verify($current, $admin['hash'])) {
      $error = 'Current password is not correct.';
    } elseif (strlen($password) < 8) {
      $error = 'Choose a new password with at least 8 characters.';
    } elseif ($password !== $confirm) {
      $error = 'Those new passwords do not match.';
    } elseif (!paperboy_save_admin_settings(['hash' => password_hash($password, PASSWORD_DEFAULT)])) {
      $error = 'Could not update the password.';
    } else {
      $notice = 'Admin password updated.';
    }
  }
}

if (isset($_GET['setup']) && $logged_in) {
  $notice = 'Password saved. You can now set the currencies and rates customers will see.';
}

$settings = paperboy_currency_settings();
$catalog = paperboy_currency_catalog();
$csrf = htmlspecialchars(shop_admin_csrf_token(), ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Currency rates - Paperboy JA shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/styles.css?v=19">
</head>
<body class="shop-admin-body">
  <header class="shop-admin-top">
    <div class="shop-admin-top-inner">
      <a href="../index.php" class="shop-admin-brand">
        <img src="../images/PBJA_logo.svg" alt="Paperboy JA">
        <span>Shop currencies</span>
      </a>
      <?php if ($logged_in): ?>
      <a href="index.php?logout=1" class="shop-admin-logout">Log out</a>
      <?php endif; ?>
    </div>
  </header>

  <main class="shop-admin-main">
    <?php if ($error): ?>
    <p class="form-error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <?php if ($notice): ?>
    <p class="shop-admin-notice"><?= htmlspecialchars($notice) ?></p>
    <?php endif; ?>

    <?php if (!$has_password): ?>
    <section class="shop-admin-card">
      <h1>Set an admin password</h1>
      <p>This page is for the shop owner. Choose a password so you can add currencies and type in your own exchange rates.</p>
      <form method="post" class="shop-admin-form">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <input type="hidden" name="action" value="setup">
        <label>
          <span>Password</span>
          <input type="password" name="password" autocomplete="new-password" required minlength="8">
        </label>
        <label>
          <span>Confirm password</span>
          <input type="password" name="confirm" autocomplete="new-password" required minlength="8">
        </label>
        <button type="submit" class="btn btn-blue">Save password</button>
      </form>
    </section>

    <?php elseif (!$logged_in): ?>
    <section class="shop-admin-card shop-admin-card-narrow">
      <h1>Shop owner login</h1>
      <p>Sign in to set which currencies appear on the site and the rate you want to use for each one.</p>
      <form method="post" class="shop-admin-form">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <input type="hidden" name="action" value="login">
        <label>
          <span>Password</span>
          <input type="password" name="password" autocomplete="current-password" required>
        </label>
        <button type="submit" class="btn btn-blue">Log in</button>
      </form>
    </section>

    <?php else: ?>
    <section class="shop-admin-card">
      <h1>Currencies &amp; exchange rates</h1>
      <p>Choose how prices appear in the store: a fixed set of <strong>1, 2, 3 or 4 currencies</strong>, or the visitor’s local currency based on where they are viewing from. Then enter <strong>your</strong> rates — not a live bank feed. Rate means how many Jamaican dollars equal <strong>1 unit</strong> of that currency. Example: if you sell at <strong>1 US$ = 157 J$</strong>, type <strong>157</strong>.</p>
      <p class="shop-admin-note">Checkout still uses your PaySynk store currency.</p>

      <?php
        $mode = $settings['mode'] ?? 'fixed';
        $count = (int) ($settings['displayCount'] ?? 3);
        $slots = $settings['slots'] ?? ['jmd', 'usd', 'gbp'];
        $slot_labels = [1 => '1st currency', 2 => '2nd currency', 3 => '3rd currency', 4 => '4th currency'];
      ?>
      <form method="post" class="shop-admin-rates" id="currencyRatesForm">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <input type="hidden" name="action" value="save-rates">

        <fieldset class="shop-admin-mode">
          <legend>How prices should show</legend>
          <label class="shop-admin-choice">
            <input type="radio" name="mode" value="fixed"<?= $mode !== 'geo' ? ' checked' : '' ?>>
            <span>
              <strong>Show a fixed set</strong>
              Pick 1 to 4 currencies. Every customer sees the same ones together.
            </span>
          </label>
          <label class="shop-admin-choice">
            <input type="radio" name="mode" value="geo"<?= $mode === 'geo' ? ' checked' : '' ?>>
            <span>
              <strong>Use the visitor’s local currency</strong>
              Show the currency for where they are viewing from. If we cannot tell, show Jamaican dollars.
            </span>
          </label>
        </fieldset>

        <div class="shop-admin-fixed" id="fixedCurrencyOptions">
          <p class="shop-admin-count-label">How many currencies on the price?</p>
          <div class="shop-admin-count" role="group" aria-label="Number of currencies">
            <?php for ($n = 1; $n <= 4; $n++): ?>
            <label>
              <input type="radio" name="displayCount" value="<?= $n ?>"<?= $count === $n ? ' checked' : '' ?>>
              <span><?= $n ?></span>
            </label>
            <?php endfor; ?>
          </div>
          <div class="shop-admin-slots">
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <label class="shop-admin-slot" data-slot="<?= $i ?>">
              <span><?= $slot_labels[$i] ?></span>
              <select name="slots[]">
                <?php foreach ($catalog as $code => $meta): ?>
                <option value="<?= htmlspecialchars($code) ?>"<?= (($slots[$i - 1] ?? '') === $code) ? ' selected' : '' ?>>
                  <?= htmlspecialchars($meta['code'] . ' — ' . $meta['name']) ?>
                </option>
                <?php endforeach; ?>
              </select>
            </label>
            <?php endfor; ?>
          </div>
        </div>

        <h2>Your exchange rates</h2>
        <p class="shop-admin-note">Needed for every currency that can appear — including visitor-local mode.</p>
        <div class="shop-admin-table-wrap">
          <table class="shop-admin-table">
            <thead>
              <tr>
                <th>Currency</th>
                <th>Your rate</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($catalog as $code => $meta): ?>
              <?php
                $is_base = $code === 'jmd';
                $rate = $settings['rates'][$code] ?? '';
              ?>
              <tr>
                <td>
                  <strong><?= htmlspecialchars($meta['code']) ?></strong>
                  <span><?= htmlspecialchars($meta['name']) ?></span>
                </td>
                <td>
                  <label class="shop-admin-rate">
                    <span>1 <?= htmlspecialchars($meta['code']) ?> =</span>
                    <input
                      type="number"
                      name="rates[<?= htmlspecialchars($code) ?>]"
                      value="<?= htmlspecialchars((string) $rate) ?>"
                      min="0.0001"
                      step="any"
                      <?= $is_base ? ' readonly' : '' ?>
                    >
                    <span>JMD</span>
                  </label>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="shop-admin-preview" id="ratePreview" aria-live="polite"></div>
        <button type="submit" class="btn btn-blue">Save currencies</button>
      </form>
    </section>

    <section class="shop-admin-card shop-admin-card-narrow">
      <h2>Change password</h2>
      <form method="post" class="shop-admin-form">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <input type="hidden" name="action" value="change-password">
        <label>
          <span>Current password</span>
          <input type="password" name="current" autocomplete="current-password" required>
        </label>
        <label>
          <span>New password</span>
          <input type="password" name="password" autocomplete="new-password" required minlength="8">
        </label>
        <label>
          <span>Confirm new password</span>
          <input type="password" name="confirm" autocomplete="new-password" required minlength="8">
        </label>
        <button type="submit" class="btn btn-dark">Update password</button>
      </form>
    </section>
    <?php endif; ?>
  </main>

  <?php if ($logged_in): ?>
  <script>
    (function () {
      var form = document.getElementById('currencyRatesForm');
      var preview = document.getElementById('ratePreview');
      if (!form || !preview) return;

      function rateFor(code) {
        var input = form.querySelector('input[name="rates[' + code + ']"]');
        var n = input ? Number(input.value) : 0;
        return n > 0 ? n : 0;
      }

      function paint() {
        var usd = rateFor('usd');
        var gbp = rateFor('gbp');
        var parts = ['J$1,000 preview:'];
        if (usd) parts.push('US$' + (1000 / usd).toFixed(2));
        if (gbp) parts.push('£' + (1000 / gbp).toFixed(2));
        preview.textContent = parts.join('  ·  ');
      }

      function syncFixed() {
        var geo = form.querySelector('input[name="mode"][value="geo"]');
        var fixedBox = document.getElementById('fixedCurrencyOptions');
        var countInput = form.querySelector('input[name="displayCount"]:checked');
        var count = countInput ? Number(countInput.value) : 1;
        if (fixedBox) fixedBox.hidden = !!(geo && geo.checked);
        var slots = form.querySelectorAll('.shop-admin-slot');
        for (var i = 0; i < slots.length; i++) {
          var on = i < count;
          slots[i].hidden = !on;
          var select = slots[i].querySelector('select');
          if (select) select.disabled = !on;
        }
      }

      form.addEventListener('input', paint);
      form.addEventListener('change', syncFixed);
      paint();
      syncFixed();
    })();
  </script>
  <?php endif; ?>
</body>
</html>
