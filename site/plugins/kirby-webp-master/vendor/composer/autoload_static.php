<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7a84c162db8fecaa4229566576be4a8d
{
    public static $prefixesPsr0 = array (
        'W' => 
        array (
            'WebPConvert' => 
            array (
                0 => __DIR__ . '/..' . '/rosell-dk/webp-convert',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit7a84c162db8fecaa4229566576be4a8d::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
