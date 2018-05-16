<?php snippet('header') ?>

<?php if($image = $page->images()->first()): ?>
<div style="background-image: url(<?= $image->url() ?>); ">
	<h1><?php echo $page->title()->html() ?></h1>
</div>
<?php endif ?>

<?php snippet('instagram') ?>


<?php snippet('footer') ?>