<?php snippet('header') ?>

	<main class="projects" role="main">
	
		<header class="hero hidden">
			<h1><?= $page->title()->html() ?></h1>
		</header>

		<article class="grid-x">
			<?php snippet('showcase') ?>
		</article>

	</main>

<?php snippet('footer') ?>
