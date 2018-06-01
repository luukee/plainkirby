<?php snippet('header') ?>

	<main class="projects" role="main">

		<header class="hero grid-container">
			<h1 class="hidden"><?= $page->title()->html() ?></h1>

			<section class="grid-x align-center-middle text-center">

				<div class="small-12 large-12 intro-title align-center">
					<h3><?= $page->introTitle()->html() ?></h3>
				</div>

				<div class="small-12 large-12 intro-text align-center">
					<h3><?= $page->introText()->html() ?></h3>
				</div>

			</section>
		</header>

		<article class="grid-x">
			<?php snippet('showcase') ?>
		</article>

	</main>

<?php snippet('footer') ?>
