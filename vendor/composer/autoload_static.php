<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb7f1cc59634ce67f5587877842ef719f
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitb7f1cc59634ce67f5587877842ef719f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb7f1cc59634ce67f5587877842ef719f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb7f1cc59634ce67f5587877842ef719f::$classMap;

        }, null, ClassLoader::class);
    }
}
