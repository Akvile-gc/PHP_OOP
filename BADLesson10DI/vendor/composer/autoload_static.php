<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit65261f025b5e278acd435667a255deb9
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lessoon10DI\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lessoon10DI\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit65261f025b5e278acd435667a255deb9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit65261f025b5e278acd435667a255deb9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit65261f025b5e278acd435667a255deb9::$classMap;

        }, null, ClassLoader::class);
    }
}
