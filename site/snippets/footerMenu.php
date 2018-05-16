<?php

$items = $pages->visible();

if($items->count()):

?>	
<nav class="footer small-12">
	<ul>
		<?php foreach ($items as $item): ?>
		<li><a 
				<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>">
				<?= $item->title() ?>
			</a></li>
		<?php endforeach ?>
	</ul>
</nav>
<?php endif ?>