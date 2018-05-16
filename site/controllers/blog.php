<?php

return function ($site, $pages, $page) {
    $articles = $page->children()->visible()->flip()->paginate(1);

    // add a tag filter
    if ($tag = param('tag')) {
        $articles = $articles->filterBy('tag', '=', urldecode($tag), ',');
    }

    // create a shortcut for pagination
    $pagination = $articles->pagination();

    return compact('articles', 'pagination');
};
