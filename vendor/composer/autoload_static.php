<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15ba8647cc4f66982d8211ba9e4f6305
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit15ba8647cc4f66982d8211ba9e4f6305::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit15ba8647cc4f66982d8211ba9e4f6305::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
