<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita8e5978c185bdb47b17e90f2187f0ddf
{
    public static $prefixLengthsPsr4 = array (
        'J' => 
        array (
            'JiteshMenia\\PayomatixSeamless\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'JiteshMenia\\PayomatixSeamless\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInita8e5978c185bdb47b17e90f2187f0ddf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita8e5978c185bdb47b17e90f2187f0ddf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita8e5978c185bdb47b17e90f2187f0ddf::$classMap;

        }, null, ClassLoader::class);
    }
}
