<?php snippet('header') ?>

<main class="project" role="main">

    <header class="hero sm">

        <!-- header title -->
        <div class="project-info">

            <h1 class="project-title">
            <?= $page->title()->html() ?>
            </h1>

        </div>

        <!-- header image -->
        <div class="img-cover">
            <picture class="hero-img">

                <?php
                $image = $page->coverimage()->toFile();
                if ($image):
                ?>
                <source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
                <img src="<?= $image->url() ?>" alt="<?= $page->title()->html() ?>">
                <?php endif ?>

            </picture>
        </div>

    </header>

    <!-- main article -->
    <article class="grid-x text-entry">

        <!-- page text content -->
        <div class="cell">
            <p>
                <?php echo $page->text()->html() ?>
            </p>
        </div>

    </article>

</main>

<?php snippet('footer') ?>
