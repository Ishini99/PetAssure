<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit29ec04f9faddc87c04ff1c2bd0bf6562
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit29ec04f9faddc87c04ff1c2bd0bf6562::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit29ec04f9faddc87c04ff1c2bd0bf6562::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit29ec04f9faddc87c04ff1c2bd0bf6562::$classMap;

        }, null, ClassLoader::class);
    }
}
