<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2faefb2289fecd859363a862c752759c
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2faefb2289fecd859363a862c752759c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2faefb2289fecd859363a862c752759c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2faefb2289fecd859363a862c752759c::$classMap;

        }, null, ClassLoader::class);
    }
}
