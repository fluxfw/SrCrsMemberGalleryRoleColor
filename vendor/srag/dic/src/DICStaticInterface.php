<?php

namespace srag\DIC\SrCrsMemberGalleryRoleColor;

use srag\DIC\SrCrsMemberGalleryRoleColor\DIC\DICInterface;
use srag\DIC\SrCrsMemberGalleryRoleColor\Exception\DICException;
use srag\DIC\SrCrsMemberGalleryRoleColor\Output\OutputInterface;
use srag\DIC\SrCrsMemberGalleryRoleColor\Plugin\PluginInterface;
use srag\DIC\SrCrsMemberGalleryRoleColor\Version\VersionInterface;

/**
 * Interface DICStaticInterface
 *
 * @package srag\DIC\SrCrsMemberGalleryRoleColor
 */
interface DICStaticInterface
{

    /**
     * Clear cache. Needed for instance in unit tests
     *
     * @deprecated
     */
    public static function clearCache()/*: void*/ ;


    /**
     * Get DIC interface
     *
     * @return DICInterface DIC interface
     *
     * @throws DICException DIC not supports ILIAS X.X.X anymore!"
     */
    public static function dic() : DICInterface;


    /**
     * Get output interface
     *
     * @return OutputInterface Output interface
     */
    public static function output() : OutputInterface;


    /**
     * Get plugin interface
     *
     * @param string $plugin_class_name
     *
     * @return PluginInterface Plugin interface
     *
     * @throws DICException Class $plugin_class_name not exists!
     * @throws DICException Class $plugin_class_name not extends ilPlugin!
     * @logs   DEBUG Please implement $plugin_class_name::getInstance()!
     */
    public static function plugin(string $plugin_class_name) : PluginInterface;


    /**
     * Get version interface
     *
     * @return VersionInterface Version interface
     */
    public static function version() : VersionInterface;
}
