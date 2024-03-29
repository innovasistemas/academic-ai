<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite0a3f139e3e7accd40d03dfc4911dcbd
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite0a3f139e3e7accd40d03dfc4911dcbd::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite0a3f139e3e7accd40d03dfc4911dcbd::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite0a3f139e3e7accd40d03dfc4911dcbd::$classMap;

        }, null, ClassLoader::class);
    }
}
