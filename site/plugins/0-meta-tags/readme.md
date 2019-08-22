# Kirby Meta Tags [![Release](https://img.shields.io/github/release/pedroborges/kirby-meta-tags.svg)](https://github.com/pedroborges/kirby-meta-tags/releases) [![Issues](https://img.shields.io/github/issues/pedroborges/kirby-meta-tags.svg)](https://github.com/pedroborges/kirby-meta-tags/issues)

HTML meta tags generator for Kirby. Supports [Open Graph](http://ogp.me) and [Twitter Cards](https://dev.twitter.com/cards/overview) out of the box.

## Requirements
- Kirby 2.3.2+
- PHP 5.4+

## Installation

### Download
[Download the files](https://github.com/pedroborges/kirby-meta-tags/archive/master.zip) and place them inside `site/plugins/meta-tags`.

### Kirby CLI
Kirby's [command line interface](https://github.com/getkirby/cli) is the easiest way to install the Meta Tags plugin:

    $ kirby plugin:install pedroborges/kirby-meta-tags

To update it simply run:

    $ kirby plugin:update pedroborges/kirby-meta-tags

### Git Submodule
You can add the Meta Tags as a Git submodule.

<details>
    <summary><strong>Show Git Submodule instructions</strong> 👁</summary><p>

    $ cd your/project/root
    $ git submodule add https://github.com/pedroborges/kirby-meta-tags.git site/plugins/meta-tags
    $ git submodule update --init --recursive
    $ git commit -am "Add plugin Meta Tags"

Updating is as easy as running a few commands.

    $ cd your/project/root
    $ git submodule foreach git checkout master
    $ git submodule foreach git pull
    $ git commit -am "Update submodules"
    $ git submodule update --init --recursive

</p></details>

## Basic Usage
After installing the Meta Tags plugin, you need to add one line to the `head` element on your template, or `header.php` snippet:

```diff
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
+    <?php echo $page->metaTags() ?>
```

### Default

The plugin ships with some default meta tags enabled for your convenience:

```php
c::set('meta-tags.default', function(Page $page, Site $site) {
    return [
        'title' => $site->title(),
        'meta' => [
            'description' => $site->description()
        ],
        'link' => [
            'canonical' => $page->url()
        ],
        'og' => [
            'title' => $page->isHomePage()
                ? $site->title()
                : $page->title(),
            'type' => 'website',
            'site_name' => $site->title(),
            'url' => $page->url()
        ]
    ];
});
```

**The `meta-tags.default` option is applied to all pages on your Kirby site.** Of course you can change the defaults. In order to do that, just copy this example to your `site/config/config.php` file and tweak it to fit your website needs.

> If your configuration file grows too much, you can extract it to a `site/config/meta-tags.php` file, for example, and require it from `site/config/config.php`.

### Templates
Following the flexible spirit of Kirby, you also have the option to add template specific meta tags:

```php
c::set('meta-tags.templates', function(Page $page, Site $site) {
    return [
        'song' => [
            'og' => [
                'type' => 'music.song',
                'namespace:music' => [
                    'duration' => $page->duration(),
                    'album' => $page->parent()->url(),
                    'musician' => $page->singer()->html()
                ]
            ]
        ]
    ];
});
```

In the example above, those settings will only be applied to pages which template is `song`.

For more information on all the `meta`, `link`, Open Graph and Twitter Card tags available, check out these resources:

- [`<head>` Cheat Sheet](http://gethead.info)
- [Open Graph](http://ogp.me)
- [Twitter Cards](https://dev.twitter.com/cards/overview)

## Options
Both the `meta-tags.default` and `meta-tags.templates` accept similar values:

### `meta-tags.default`
It accepts an array containing any or all of the following keys: `title`, `meta`, `link`, `og`, and `twitter`. With the exception of `title`, all other groups must return an array of key-value pairs. Check out the [tag groups](#tag-groups) section to learn which value types are accepted by each key.

```php
c::set('meta-tags.default', [
    'title' => 'Site Name',
    'meta' => [ /* meta tags */ ],
    'link' => [ /* link tags */ ],
    'og' => [ /* Open Graph tags */ ],
    'twitter' => [ /* Twitter Card tags */ ]
]);
```

### `meta-tags.templates`
This option allows you to define a template specific set of meta tags. It must return an array where each key corresponds to the template name you are targeting.

```php
c::set('meta-tags.templates', [
    'article' => [ /* tags groups */ ],
    'about' => [ /* tags groups */ ],
    'products' => [ /* tags groups */ ],
]);
```

When a key matches the current page template name, it is merged and overrides any repeating properties defined on the `meta-tags.default` option so you don't have to repeat yourself.

## Tag Groups
These groups accept string, closure, or array as their values. Being so flexible, the sky is the limit to what you can do with Meta Tags!

### `title`
Corresponds to the HTML `<title>` element and accepts a `string` as value.

```php
'title' => $page->isHomePage()
    ? $site->title()
    : $page->title(),
```

> You can also pass it a `closure` that returns a `string` if the logic to generate the `title` is more complex.

### `meta`
The right place to put any generic HTML `<meta>` elements. It takes an `array` of key-value pairs. The returned value must be a `string` or `closure`.

```php
'meta' => [
    'description' => $site->description(),
    'robots' => 'index,follow,noodp'
],
```

<details>
    <summary><strong>Show HTML</strong> 👁</summary><p>

```html
<meta name="description" content="Website description">
<meta name="robots" content="index,follow,noodp">
```

</p></details>

### `link`
This tag group is used to render HTML `<link>` elements. It takes an `array` of key-value pairs. The returned value can be a `string`, `array`, or `closure`.

```php
'link' => [
    'stylesheet' => url('assets/css/main.css'),
    'icon' => [
      ['href' => url('assets/images/icons/favicon-62.png'), 'sizes' => '62x62', 'type' =>'image/png'],
      ['href' => url('assets/images/icons/favicon-192.png'), 'sizes' => '192x192', 'type' =>'image/png']
    ],
    'canonical' => $page->url(),
    'alternate' => function(Page $page, Site $site) {
        $locales = [];

        foreach ($site->languages() as $language) {
            if ($language->code() == $site->language()) continue;

            $locales[] = [
                'hreflang' => $language->code(),
                'href' => $page->url($language->code())
            ];
        }

        return $locales;
    }
],
```

<details>
    <summary><strong>Show HTML</strong> 👁</summary><p>

```html
<link rel="stylesheet" href="https://pedroborg.es/assets/css/main.css">
<link rel="icon" href="https://pedroborg.es/assets/images/icons/favicon-62.png" sizes="62x62" type="image/png">
<link rel="icon" href="https://pedroborg.es/assets/images/icons/favicon-192.png" sizes="192x192" type="image/png">
<link rel="canonical" href="https://pedroborg.es">
<link rel="alternate" hreflang="pt" href="https://pt.pedroborg.es">
<link rel="alternate" hreflang="de" href="https://de.pedroborg.es">
```

</p></details>

### `og`
Where you can define [Open Graph](http://ogp.me) `<meta>` elements.

```php
'og' => [
    'title' => $page->title(),
    'type' => 'website',
    'site_name' => $site->title(),
    'url' => $page->url()
],
```

<details>
    <summary><strong>Show HTML</strong> 👁</summary><p>

```html
<meta property="og:title" content="Passionate web developer">
<meta property="og:type" content="website">
<meta property="og:site_name" content="Pedro Borges">
<meta property="og:url" content="https://pedroborg.es">
```

</p></details>

Of course you can use Open Graph [structured objects](http://ogp.me/#structured). Let's see a blog post example:

```php
c::set('meta-tags.templates', function(Page $page, Site $site) {
    return [
        'article' => [ // template name
            'og' => [  // tags group name
                'type' => 'article', // overrides the default
                'namespace:article' => [
                    'author' => $page->author(),
                    'published_time' => $page->date('%F'),
                    'modified_time' => $page->modified('%F'),
                    'tag' => ['tech', 'web']
                ],
                'namespace:image' => function(Page $page) {
                    $image = $page->cover()->toFile();
    
                    return [
                        'image' => $image->url(),
                        'height' => $image->height(),
                        'width' => $image->width(),
                        'type' => $image->mime()
                    ];
                }
            ]
        ]
    ];
});
```

<details>
    <summary><strong>Show HTML</strong> 👁</summary><p>

```html
<!-- merged default definition -->
<title>Pedro Borges</title>
<meta name="description" content="Passionate web developer">
<meta property="og:title" content="How to make a Kirby plugin">
<meta property="og:site_name" content="Pedro Borges">
<meta property="og:url" content="https://pedroborg.es/blog/how-to-make-a-kirby-plugin">
<!-- template definition -->
<meta property="og:type" content="article">
<meta property="og:article:author" content="Pedro Borges">
<meta property="og:article:published_time" content="2017-02-28">
<meta property="og:article:modified_time" content="2017-03-01">
<meta property="og:article:tag" content="tech">
<meta property="og:article:tag" content="web">
<meta property="og:image" content="https://pedroborg.es/content/blog/how-to-make-a-kirby-plugin/code.jpg">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:type" content="image/jpeg">
```

</p></details>

Use the `namespace:` prefix for structured properties:

- `author` inside `namespace:article` becomes `og:article:author`.
- `image` inside `namespace:image` becomes `og:image`.
- `width` inside `namespace:image` becomes `og:image:width`.

> When using Open Graph tags, you will want to add the `prefix` attribute to the `html` element as suggested on [their docs](http://ogp.me/#metadata): `<html prefix="og: http://ogp.me/ns#">`

### `twitter`
This tag group works just like the previous one, but it generates `<meta>` tags for [Twitter Cards](https://dev.twitter.com/cards/overview) instead.

```php
'twitter' => [
    'card' => 'summary',
    'site' => $site->twitter(),
    'title' => $page->title(),
    'namespace:image' => function(Page $page) {
        $image = $page->cover()->toFile();

        return [
            'image' => $image->url(),
            'alt' => $image->alt()
        ];
    }
]
```

<details>
    <summary><strong>Show HTML</strong> 👁</summary><p>

```html
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@pedroborg_es">
<meta name="twitter:title" content="My blog post title">
<meta name="twitter:image" content="https://pedroborg.es/content/blog/my-article/cover.jpg">
<meta name="twitter:image:alt" content="Article cover image">
```

</p></details>

## Change Log
All notable changes to this project will be documented at: <https://github.com/pedroborges/kirby-meta-tags/blob/master/changelog.md>

## License
Meta Tags plugin is open-sourced software licensed under the [MIT license](http://www.opensource.org/licenses/mit-license.php).

Copyright © 2017 Pedro Borges <oi@pedroborg.es>
