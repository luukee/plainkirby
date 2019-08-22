

<?php snippet('header') ?>

	<main class="collection" role="main">

		<header class="hero">

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
				<!-- header title -->
				<div class="project-info">

					<h1 class="project-title">
					<?= $page->title()->html() ?>
					</h1>

				</div>
			</div>

		</header>

		<!-- main article/content -->
		<article class="grid-x grid-padding-x">

			<section class="small-12">
				<!-- text -->
					<?= $page->text()->kirbytext() ?>

			</section>

		</article>

    <?php snippet('prevnext') ?>

	</main>
	<?php snippet('footer') ?>
