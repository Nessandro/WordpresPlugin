<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0cfaaad87a63161e720b6136c15e9574
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TaxFormPlugin\\Core\\' => 19,
            'TaxFormPlugin\\App\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TaxFormPlugin\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'TaxFormPlugin\\App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0cfaaad87a63161e720b6136c15e9574::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0cfaaad87a63161e720b6136c15e9574::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
