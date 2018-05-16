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

        <!-- blog excerpt -->
        <div class="blog-excerpt">
            <!-- Title -->
            <a href="<?= $article->url() ?>">
                <h1 class="blog-title">
                    <?= $article->title()->html() ?>
                </h1>
            </a>

            <p><?= $article->text()->excerpt(300) ?></p>

            <a href="<?= $article->url() ?>">Read more. . .</a>

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
