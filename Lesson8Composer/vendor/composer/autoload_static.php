<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8b5c0d506cb1da948d66f71c4f17a813
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lesson8Composer\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lesson8Composer\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit8b5c0d506cb1da948d66f71c4f17a813::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8b5c0d506cb1da948d66f71c4f17a813::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8b5c0d506cb1da948d66f71c4f17a813::$classMap;

        }, null, ClassLoader::class);
    }
}
