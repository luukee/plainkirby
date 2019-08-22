<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-52499J7');</script>
    <!-- End Google Tag Manager -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- social media meta tags -->
    <title><?= $page->title()->html() ?> | Luke Carl Hartman</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/assets/images/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/assets/images/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/images/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/images/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/assets/images/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/assets/images/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/assets/images/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/assets/images/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/assets/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/assets/images/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="manifest" href="/assets/images/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/assets/images/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">


    <meta name="description" content="Web Development with Luke" />
    <?php echo $page->metaTags() ?>
    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">

    <!-- Open Graph data -->
    <meta property="og:title" content="<?= $page->title()->html() ?>" />
    <meta property="og:site_name" content="Web Development with Luke">
    <meta property="og:type" content="article" />
    <meta property="og:url" content="<?= $page->url() ?>" />
    <meta property="og:image" content="<?php
    $image = $page->coverimage()->toFile();
    if ($image) {
        echo $image->url();
    } else {
        echo 'http://lukecarlhartman.com/content/luke-carl-hartman-front-end-web-developer.jpg';
    }
    ?>" />
    <meta property="og:description" content="<?= $page->description()->html() ?>" />

    <?php if ($page->description() != ''): ?>
    <meta name="description" content="<?= $page->description()->html() ?>" />
    <?php else: ?>
    <meta name="description" content="<?= $site->description()->html() ?>" />
    <?php endif ?>

    <?php if ($page->keywords() != ''): ?>
    <meta name="keywords" content="<?= $page->keywords()->html() ?>" />
    <?php else: ?>
    <meta name="keywords" content="<?= $site->keywords()->html() ?>" />
    <?php endif ?>

    <?= $site->redirecty() ?>
  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <?= css('assets/css/foundation.css') ?>
  <?= css('assets/css/app.css') ?>
  <?= css('assets/css/jquery.fancybox.css') ?>

  <!-- Google Fonts -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Philosopher" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,700" rel="stylesheet">

  <!-- Google Search console meta tag -->
  <meta name="google-site-verification" content="T6n--3nlBFgihPKDT0whivBPHk4zRnPRDQEBqZsHgyk" />

  <!-- prevent mobile left & right scrolling -->
  <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1.0" />
  <meta name="apple-mobile-web-app-capable" content="yes" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

  <!-- lazy load: https://github.com/ApoorvSaxena/lozad.js-->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>

<script type="text/javascript" src="//script.crazyegg.com/pages/scripts/0077/7415.js" async="async"></script>

</head>
<!-- body element with dynamic class: based on the page -->
<?php if ($page->isHomePage()): ?>
  <body id="home">
<?php else: ?>
  <?php if ($page->hasVisibleChildren()): ?>
    <body id="<?= $page->template() ?>-section">
  <?php else: ?>
    <body id="<?= $page->template() ?>-page">
  <?php endif ?>
<?php endif ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-52499J7"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header class="grid-x fluid main-nav">

		<?php snippet('menu') ?>

        <h2 class="small-8 medium-4 title">
            <a href="<?= url() ?>" rel="Home"><?= $site->title()->html() ?></a>
        </h2>

		<?php snippet('social') ?>

	</header>
