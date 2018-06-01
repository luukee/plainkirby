<?php

$articles = page('blog')->children()->visible();

if (isset($limit)) {
    $articles = $articles->limit($limit);
}

?>

<?php snippet('header') ?>


<!-- main -->
<main class="grid-x blog" role="main">

<?php foreach ($articles as $article): ?>
    <!-- each article -->
    <article class="blog-section cell medium-6 large-4">
            <div class="blog-image">

        		<?php if ($image = $article->images()->sortBy('sort', 'asc')->first()): $thumb = $image->crop(600, 600); ?>
                    <a href="<?= $article->url() ?>">
                        <div class="img-cover">

            				<picture>
            					<source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
            					<img src="<?= $image->url() ?>" alt="Thumbnail for <?= $article->title()->html() ?>" />
            				</picture>

            			</div>
                    </a>
        		<?php endif ?>

            </div>


        <div class="blog-excerpt grid-container">
            <!-- Title -->
            <div class="grid-x grid-padding-x">
                <div class="cell small-6">
                    <a href="<?= $article->url() ?>">
                       <h2><?= $article->title()->html() ?></h2>
                    </a>
                </div>

                <!-- Date -->
                <div class="cell small-6 align-self-bottom shrink">
                    <time class="align-right dark">
                        <?= $article->date('F jS, Y') ?>
                    </time>
                </div>

            </div>

            <div class="grid-x grid-padding-x">
                <!-- Excerpt -->
                <p class="cell small-12">
                    <?= $article->text()->excerpt(300) ?>
                </p>
            </div>

            <div class="grid-x grid-padding-x">
                <div class="cell small-12">
                    <a href="<?= $article->url() ?>">Read more. . .</a>
                </div>
            </div>

        </div>

    </article>

<?php endforeach ?>

<nav class="pagination blog-paginate grid-x">

    <div class="cell small-12">
        <?php if ($pagination->hasNextPage()): ?>
            <a class="text-center" href="<?= $pagination->nextPageUrl() ?>">next article</a>
        <?php endif ?>
    </div>

</nav>

</main>

<?php snippet('footer') ?>
