

<?php snippet('header') ?>

	<main class="project" role="main">

		<header class="hero">

			<!-- header title -->
			<div class="project-info">

				<h1 class="project-title">
				<?= $page->title()->html() ?>
				</h1>

				<time class="project-date">
				<?= $page->date('F j, Y'); ?>
				</time>

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

		<!-- main article/content -->
		<article class="grid-x">

			<!-- title -->
			<header class="medium-12 text-entry">

				<?= $page->text()->html() ?>

			</header>

			<!-- background image -->
			<?php foreach ($page->images()->sortBy('sort', 'asc') as $image): ?>

			<a class="project-section medium-6" data-fancybox="<?= $page->title()->html() ?>-gallery" href="<?= $image->url() ?>">
				<div class="img-cover">
					<picture class="medium-6">
						<source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
						<img src="<?= $image->url() ?>" alt="<?= $page->title()->html() ?>" />
					</picture>
				</div>
			</a>

			<?php endforeach ?>

		</article>

    <?php snippet('prevnext') ?>

	</main>
	<?php snippet('footer') ?>
