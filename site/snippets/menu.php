<?php

$items = $pages->visible();

if($items->count()):

?>
<!-- Menu pulled from: https://codepen.io/luukee/pen/xjwyOV	 -->
<nav role="navigation" class="small-4 medium-4">
	<div id="menuToggle">
		<input type="checkbox">
		<span></span>
		<span></span>
		<span></span>
		<ul id="menu">

			<?php foreach ($items as $item): ?>
			<li>
				<a <?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>" title="<?= $item->title() ?>">
					<?= $item->title() ?>
				</a>
			</li>
			<?php endforeach ?>
		</ul>
	</div>
</nav>
<?php endif ?>


