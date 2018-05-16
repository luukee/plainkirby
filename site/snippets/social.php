
<ul class="small-4 medium-4 social">
	<?php 
	// create a variable for each new social row
	$rows = $site->social()->toStructure();

	// make sure some social icons have been added
	if(count($rows)):

		// loop through each
		foreach($rows as $row): ?>

			<li>
				<a href="<?= $row->hyperlink()->html() ?>" target="_blank">
					<i class="fab fa-<?= $row->icon()->html() ?>"></i>
				</a>
			</li>

		<?php endforeach ?>

	<?php endif ?>
</ul>
