<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit5c0c6e6fd7bcbb3d3c427b5f49a80303
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit5c0c6e6fd7bcbb3d3c427b5f49a80303', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit5c0c6e6fd7bcbb3d3c427b5f49a80303', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit5c0c6e6fd7bcbb3d3c427b5f49a80303::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
