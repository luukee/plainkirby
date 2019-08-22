

<?php snippet('header') ?>

	<main class="project" role="main">

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
		<article class="grid-x">

			<!-- title -->
			<header class="medium-12 text-entry">

				<?= $page->text()->kirbytext() ?>

			</header>

			<?php
            $images = $page->images()->sortBy('sort', 'asc');
            $first = $images->first();
            $images = $images->not($first);
            foreach ($images as $img): ?>
			<!-- print images... -->

			<a class="project-section medium-6" data-fancybox="<?= $page->title()->html() ?>-gallery" href="<?= $img->url() ?>">
				<div class="img-cover">
					<picture class="medium-6">
						<source media="(max-width: 768px)" srcset="<?= $img->url() ?>">
						<img src="<?= $img->url() ?>" alt="<?= $page->title()->html() ?>" />
					</picture>
				</div>
			</a>

			<?php endforeach ?>


		</article>

    <?php snippet('prevnext') ?>

	</main>
	<?php snippet('footer') ?>
