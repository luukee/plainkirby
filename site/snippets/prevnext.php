<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

if($page->hasNextVisible() || $page->hasPrevVisible()): ?>
  <nav class="pagination <?= !@$flip ?: ' flip' ?> wrap cf">

    <?php if($page->hasPrevVisible()): ?>
      <a class="pagination-item <?= $directionPrev ?>" href="<?= $page->prevVisible()->url() ?>" rel="prev" title="<?= $page->prevVisible()->title()->html() ?>">
        <i class="fas fa-arrow-left"></i>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionPrev ?> is-inactive">
        <i class="fas fa-arrow-left"></i>
      </span>
    <?php endif ?>

    <?php if($page->hasNextVisible()): ?>
      <a class="pagination-item <?= $directionNext ?>" href="<?= $page->nextVisible()->url() ?>" rel="next" title="<?= $page->nextVisible()->title()->html() ?>">
        <i class="fas fa-arrow-right"></i>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionNext ?> is-inactive">
        <i class="fas fa-arrow-right"></i>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>