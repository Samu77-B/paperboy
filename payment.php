<?php
$page_title = 'Payment';
$page_description = 'Secure payment for Paperboy JA orders. Pay online with the SENTRY Payment Gateway.';
$current_page = '';
$depth = 0;
include 'includes/head.php';
include 'includes/nav.php';
?>

  <div class="page-banner" style="background: var(--dark);">
    <h1><?= $page_title ?></h1>
  </div>

  <section style="padding: 40px 0;">
    <div class="container">
      <div class="payment-gateway-embed" style="min-height: 600px;">
        <iframe src="/SENTRY/PaymentGateway/Merchant/Administration/MerchantPages/88804124/paperboypayments/japayments/" title="SENTRY Payment Gateway" style="width: 100%; min-height: 600px; border: none;"></iframe>
      </div>
    </div>
  </section>

<?php include 'includes/footer.php'; ?>
