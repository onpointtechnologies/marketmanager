<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite564e04d75c44568b7a3e6a12736c03b
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

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite564e04d75c44568b7a3e6a12736c03b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite564e04d75c44568b7a3e6a12736c03b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}