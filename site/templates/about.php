<?php snippet('header') ?>

<main class="project" role="main">

    <header class="hero sm">

        <!-- header image -->
        <div class="img-cover" id="container" style="perspective:40px">
            <picture class="hero-img">

                <?php
                $image = $page->coverimage()->toFile();
                if ($image):
                ?>
                <source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
                <img src="<?= $image->url() ?>" alt="<?= $page->title()->html() ?>">
                <?php endif ?>

            </picture>
            <!-- header title -->
            <div class="project-info">

                <h1 class="project-title">
                <?= $page->title()->html() ?>
                </h1>

            </div>
        </div>

    </header>

    <!-- main article -->
    <article class="grid-container">

        <!-- page text content -->

        <section class="grid-x grid-padding-x">
            <!-- picture element here:  plainkirby/notToWeb -->

        </section>

        <section id="contact" class="grid-x grid-padding-x contact">
            <div class="cell medium-6">
                    <?= $page->text()->kirbytext() ?>
            </div>
            <div class="cell medium-6 align-center">
                <?php snippet('contact-form') ?>
                <?php
                    // if the form was successfully submitted and the page created, show the success message
                    if (isset($success)): ?>
                      <div class="message">
                        <?= $success; ?>
                      </div>
                    <?php endif ?>

                    <?php
                    // if the form input does not validate, show a list of alerts
                    if ($alert): ?>
                      <div class="alert">
                        <ul>
                          <?php foreach ($alert as $message): ?>
                            <li><?= html($message) ?></li>
                          <?php endforeach ?>
                        </ul>
                      </div>
                    <?php endif ?>

                    <?php if (!isset($success)) {
                        // if the $success variable is not set, show the form (i.e. when the page is first loaded or the form submission was not successful)
                        snippet('form', compact('data'));
                    }
                ?>
            </div>
        </section>


    </article>

</main>

<?php snippet('footer') ?>
