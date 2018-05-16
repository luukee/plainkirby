<?php

field::$methods['toSlug'] = function($field) {
  return str::slug(str::unhtml($field->value()));
};


// add the page template as the body class
page::$methods['getBodyClass'] = function ($page) {
    $class= '';
    if ($page->parents()->count()) {
        $class = $page->parent()->template() . '-child'; // or title or template
    } else {
        $class = $page->template();
    }
    return $class;
}

    /* converts a field value to slug
     * Usage example:
     * <h1 id="<?= $page->title()->toSlug() ?>"><?= $page->title() ?></h1>
     */

?>
