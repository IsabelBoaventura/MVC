<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef510b03b815029fbb27b753550cb054
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef510b03b815029fbb27b753550cb054::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef510b03b815029fbb27b753550cb054::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef510b03b815029fbb27b753550cb054::$classMap;

        }, null, ClassLoader::class);
    }
}
