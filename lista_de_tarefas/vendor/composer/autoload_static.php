<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4ca372f972d48c2ca53e9b535d8f883f
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4ca372f972d48c2ca53e9b535d8f883f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4ca372f972d48c2ca53e9b535d8f883f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit4ca372f972d48c2ca53e9b535d8f883f::$classMap;

        }, null, ClassLoader::class);
    }
}