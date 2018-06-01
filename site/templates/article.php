<?php snippet('header') ?>

	<main class="main article grid-container" role="main">

			<header class="grid-x grid-padding-x">

					<!-- banner image -->
					<div class="cell medium-12">

						<?php
                        $image = $page->coverimage()->toFile();
                        if ($image):
                        ?>
							<source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
							<img src="<?= $image->url() ?>" alt="<?= $page->title()->html() ?>">
						<?php endif ?>

					</div>

					<!-- article info -->
					<div class="cell medium-12">

						<div class="grid-x">
							<!-- title -->
							<div class="cell small-6 align-self-bottom shrink">
								<h1><?= $page->title()->html() ?></h1>
							</div>
							<!-- date -->
							<div class="cell small-6 align-self-bottom">
								<time class="align-right dark">
									<?= $page->date('F jS, Y') ?>
								</time>
							</div>
						</div>
					</div>

			</header>

			<!-- copy -->
			<div class="text grid-x grid-padding-x">
				<p class="cell"
					<?= $page->text()->kirbytext() ?>
				</div>
			</div>

	</main>

<?php snippet('prevnext') ?>

<?php snippet('footer') ?>
