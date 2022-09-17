<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitfc758f8778adebcc730a179f13417cd6
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GCOFILTERPRODUCTS\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GCOFILTERPRODUCTS\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitfc758f8778adebcc730a179f13417cd6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitfc758f8778adebcc730a179f13417cd6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitfc758f8778adebcc730a179f13417cd6::$classMap;

        }, null, ClassLoader::class);
    }
}