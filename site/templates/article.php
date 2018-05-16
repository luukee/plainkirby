<?php snippet('header') ?>

	<main class="main article" role="main">

			<header class="article-header grid-x">
				<!-- title -->
				<div class="cell small-6">
					<h1><?= $page->title()->html() ?></h1>
				</div>

				<!-- date -->
				<div class="cell small-6  align-self-bottom">
					<time class="align-right dark">
						<?= $page->date('F jS, Y') ?>
					</time>
				</div>

				<!-- banner image -->
				<div class="cell small-12">

					<?php
                    $image = $page->coverimage()->toFile();
                    if ($image):
                    ?>
						<source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
						<img src="<?= $image->url() ?>" alt="<?= $page->title()->html() ?>">
					<?php endif ?>

				</div>
			</header>

			<!-- copy -->
			<div class="text">
				<?= $page->text()->kirbytext() ?>
			</div>

	</main>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>
