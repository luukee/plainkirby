<?php snippet('header') ?>

	<main class="projects" role="main">

		<header class="hero grid-container">
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
			<h1 class="hidden"><?= $page->title()->html() ?></h1>

			<section class="grid-x align-center-middle text-center">

				<div class="small-12 large-12 intro-title align-center">
					<h2><?= $page->introTitle()->html() ?></h2>
				</div>

				<div class="small-12 large-12 intro-text align-center">
					<h3><?= $page->introtext()->kirbytext() ?></h3>
				</div>

			</section>

		</header>

		<article class="grid-x">
			<?php snippet('showcase') ?>
		</article>

	</main>

<?php snippet('footer') ?>
