<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite6348da3399d93bfa3cdef76816cacc3
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
        'O' => 
        array (
            'OpenMetricsPhp\\Exposition\\Text\\' => 31,
        ),
        'H' => 
        array (
            'Hal\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'OpenMetricsPhp\\Exposition\\Text\\' => 
        array (
            0 => __DIR__ . '/..' . '/openmetrics-php/exposition-text/src',
        ),
        'Hal\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src/Hal',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite6348da3399d93bfa3cdef76816cacc3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite6348da3399d93bfa3cdef76816cacc3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite6348da3399d93bfa3cdef76816cacc3::$classMap;

        }, null, ClassLoader::class);
    }
}
