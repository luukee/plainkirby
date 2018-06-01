<?php

    // // add the page template as the body class
    // page::$methods['getBodyClass'] = function ($page) {
    //     $class= '';
    //     if ($page->parents()->count()) {
    //         $class = $page->parent()->template() . '-child'; // or title or template
    //     } else {
    //         $class = $page->template();
    //     }
    //     return $class;
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- social media meta tags -->
    <title>Kaitlin Moor or Sweet Keet's Photography, Fashion and Blog</title>
    <meta name="description" content="Kaitlin Moor or Sweet Keet's Photography, Fashion and Blog" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">

    <!-- Open Graph data -->
    <meta property="og:title" content="Kaitlin Moor or Sweet Keet's Photography, Fashion and Blog" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://www.sweetkeet.com/" />
    <meta property="og:image" content="http://stage.lukecarlhartman.com/content/1-projects/3-ants/cacti-2.jpg" />
    <meta property="og:description" content="Kaitlin Moor or Sweet Keet's Photography, Fashion and Blog" />

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

  <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>

  <?= css('assets/css/foundation.css') ?>
  <?= css('assets/css/app.css') ?>
  <?= css('assets/css/jquery.fancybox.css') ?>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond|Philosopher" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

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

	<header class="grid-x fluid main-nav">

		<?php snippet('menu') ?>

        <h2 class="small-4 medium-4 title">
            <a href="<?= url() ?>" rel="Home"><?= $site->title()->html() ?></a>
        </h2>

		<?php snippet('social') ?>

	</header>
