<?php
$base_url = '';
if (isset($depth) && $depth > 0) {
  $base_url = str_repeat('../', $depth);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($page_title ?? 'Paperboy JA') ?> - Paperboy JA</title>
  <meta name="description" content="<?= htmlspecialchars($page_description ?? 'Professional printing services in Kingston, Jamaica. Business cards, banners, flyers, brochures and more.') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Paperboy JA">
  <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

  <meta property="og:title" content="<?= htmlspecialchars($page_title ?? 'Paperboy JA') ?>">
  <meta property="og:description" content="<?= htmlspecialchars($page_description ?? 'Professional printing services in Kingston, Jamaica.') ?>">
  <meta property="og:image" content="https://paperboyja.com/images/PBlogoColour.png">
  <meta property="og:url" content="https://paperboyja.com/<?= $page_url ?? '' ?>">
  <meta property="og:site_name" content="Paperboy JA">
  <meta property="og:type" content="website">

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="<?= htmlspecialchars($page_title ?? 'Paperboy JA') ?>">
  <meta name="twitter:description" content="<?= htmlspecialchars($page_description ?? 'Professional printing services in Kingston, Jamaica.') ?>">
  <meta name="twitter:image" content="https://paperboyja.com/images/PBlogoColour.png">

  <meta name="geo.region" content="JM-01">
  <meta name="geo.placename" content="Kingston">
  <meta name="geo.position" content="18.017874;-76.809904">

  <link rel="shortcut icon" type="image/x-icon" href="<?= $base_url ?>images/favicon.png">
  <link rel="apple-touch-icon" href="<?= $base_url ?>images/webclip.png">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?= $base_url ?>css/styles.css?v=2">
  <?php if (!empty($page_css)): ?>
  <style><?= $page_css ?></style>
  <?php endif; ?>

  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-947981377"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-947981377');
    gtag('config', 'G-L53GKPJYJG');
  </script>

  <script>
    window.smartlook||(function(d) {
      var o=smartlook=function(){o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
      var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
      c.charset='utf-8';c.src='https://web-sdk.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '2460beb23f8608a62ad119b62361b59ee3260cd9', { region: 'eu' });
  </script>

  <script>
    (function(c,l,a,r,i,t,y){
      c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
      t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
      y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "ukkz9er0y1");
  </script>

  <?php if (!empty($schema_json)): ?>
  <script type="application/ld+json"><?= $schema_json ?></script>
  <?php endif; ?>
</head>
<body>
