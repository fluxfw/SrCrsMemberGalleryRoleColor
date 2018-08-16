<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit71096c949183a88844bcd3b39566d0d8
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'srag\\DIC\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'srag\\DIC\\' => 
        array (
            0 => __DIR__ . '/..' . '/srag/dic/src',
        ),
    );

    public static $classMap = array (
        'ilCrsMemberGalleryRoleColorPlugin' => __DIR__ . '/../..' . '/classes/class.ilCrsMemberGalleryRoleColorPlugin.php',
        'ilCrsMemberGalleryRoleColorUIHookGUI' => __DIR__ . '/../..' . '/classes/class.ilCrsMemberGalleryRoleColorUIHookGUI.php',
        'srag\\DIC\\AbstractDIC' => __DIR__ . '/..' . '/srag/dic/src/AbstractDIC.php',
        'srag\\DIC\\DICCache' => __DIR__ . '/..' . '/srag/dic/src/DICCache.php',
        'srag\\DIC\\DICException' => __DIR__ . '/..' . '/srag/dic/src/DICException.php',
        'srag\\DIC\\DICInterface' => __DIR__ . '/..' . '/srag/dic/src/DICInterface.php',
        'srag\\DIC\\DICTrait' => __DIR__ . '/..' . '/srag/dic/src/DICTrait.php',
        'srag\\DIC\\LegacyDIC' => __DIR__ . '/..' . '/srag/dic/src/LegacyDIC.php',
        'srag\\DIC\\NewDIC' => __DIR__ . '/..' . '/srag/dic/src/NewDIC.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit71096c949183a88844bcd3b39566d0d8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit71096c949183a88844bcd3b39566d0d8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit71096c949183a88844bcd3b39566d0d8::$classMap;

        }, null, ClassLoader::class);
    }
}