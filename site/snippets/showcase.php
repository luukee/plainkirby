<?php

$projects = page('projects')->children()->visible();

if (isset($limit)) {
    $projects = $projects->limit($limit);
}

?>

	<?php foreach ($projects as $project): ?>
		<a class="project-section cell medium-6" href="<?= $project->url() ?>" class="">

			<div class="project-info">

				<h1 class="project-title">
				<?= $project->title()->html() ?>
				</h1>

				<time class="project-date">
				<?= $project->date('F j, Y') ?>
				</time>

			</div>

			<?php if ($image = $project->images()->sortBy('sort', 'asc')->first()): $thumb = $image->crop(600, 600); ?>
				<div class="img-cover">
					<picture>
						<source media="(max-width: 768px)" srcset="<?= $image->url() ?>">
						<img src="<?= $image->url() ?>" alt="Thumbnail for <?= $project->title()->html() ?>" />
					</picture>
				</div>
			<?php endif ?>
		</a>
	<?php endforeach ?>
