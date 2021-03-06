<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit51e6ddbac88965ec4c4a1d90cb47393f
{
    public static $files = array (
        'e605b045816462ddc7c8ac6aeb5cf15d' => __DIR__ . '/../..' . '/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Tsugi\\' => 6,
        ),
        'E' => 
        array (
            'EONConsulting\\LaravelLTI\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Tsugi\\' => 
        array (
            0 => __DIR__ . '/..' . '/tsugi/lib/src',
            1 => __DIR__ . '/..' . '/tsugi/lib/src',
        ),
        'EONConsulting\\LaravelLTI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit51e6ddbac88965ec4c4a1d90cb47393f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit51e6ddbac88965ec4c4a1d90cb47393f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
