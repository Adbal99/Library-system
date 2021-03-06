<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitac85d2c1ca477fcec57b6b5717c1b2ef
{
    public static $prefixLengthsPsr4 = array (
        'K' => 
        array (
            'Klein\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Klein\\' => 
        array (
            0 => __DIR__ . '/..' . '/klein/klein/src/Klein',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitac85d2c1ca477fcec57b6b5717c1b2ef::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitac85d2c1ca477fcec57b6b5717c1b2ef::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
