<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitadf1eecb4992cf4e6dbe2b4bee6fabd2
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abraham\\TwitterOAuth\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abraham\\TwitterOAuth\\' => 
        array (
            0 => __DIR__ . '/..' . '/abraham/twitteroauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitadf1eecb4992cf4e6dbe2b4bee6fabd2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitadf1eecb4992cf4e6dbe2b4bee6fabd2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
