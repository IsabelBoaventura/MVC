<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb474ebed62bbe4ade36dab97b20d2aa
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb474ebed62bbe4ade36dab97b20d2aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb474ebed62bbe4ade36dab97b20d2aa::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb474ebed62bbe4ade36dab97b20d2aa::$classMap;

        }, null, ClassLoader::class);
    }
}
