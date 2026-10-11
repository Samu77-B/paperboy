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
    $enabled = $_POST['enabled'] ?? [];
    $rates = $_POST['rates'] ?? [];
    if (!is_array($enabled)) {
      $enabled = [];
    }
    if (!is_array($rates)) {
      $rates = [];
    }
    $error = paperboy_save_currency_settings([
      'enabled' => $enabled,
      'rates' => $rates,
    ]);
    if ($error === '') {
      $notice = 'Currency rates saved. Customers will see these rates immediately.';
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
  <link rel="stylesheet" href="../css/styles.css?v=17">
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
      <p>Turn on the currencies customers can pick, then enter <strong>your</strong> rate — not a live bank feed. Rate means how many Jamaican dollars equal <strong>1 unit</strong> of that currency. Example: if you sell at <strong>1 US$ = 157 J$</strong>, type <strong>157</strong>.</p>
      <p class="shop-admin-note">Prices on the site convert for display. Checkout still uses your PaySynk store currency.</p>

      <form method="post" class="shop-admin-rates" id="currencyRatesForm">
        <input type="hidden" name="csrf" value="<?= $csrf ?>">
        <input type="hidden" name="action" value="save-rates">
        <div class="shop-admin-table-wrap">
          <table class="shop-admin-table">
            <thead>
              <tr>
                <th>Offer</th>
                <th>Currency</th>
                <th>Your rate</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($catalog as $code => $meta): ?>
              <?php
                $is_base = $code === 'jmd';
                $is_on = in_array($code, $settings['enabled'], true);
                $rate = $settings['rates'][$code] ?? '';
              ?>
              <tr>
                <td>
                  <label class="shop-admin-toggle">
                    <input type="checkbox" name="enabled[]" value="<?= htmlspecialchars($code) ?>"<?= $is_on ? ' checked' : '' ?><?= $is_base ? ' disabled' : '' ?>>
                    <span><?= $is_base ? 'Always on' : 'Show' ?></span>
                  </label>
                  <?php if ($is_base): ?>
                  <input type="hidden" name="enabled[]" value="jmd">
                  <?php endif; ?>
                </td>
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

      form.addEventListener('input', paint);
      paint();
    })();
  </script>
  <?php endif; ?>
</body>
</html>
