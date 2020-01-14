<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\DIC\SrCrsMemberGalleryRoleColor\DICTrait;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Config;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository
{

    use DICTrait;
    use SrCrsMemberGalleryRoleColorTrait;
    const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
    /**
     * @var self
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * Repository constructor
     */
    private function __construct()
    {

    }


    /**
     *
     */
    public function dropTables()/*:void*/
    {
        self::dic()->database()->dropTable(Config::TABLE_NAME, false);
    }


    /**
     *
     */
    public function installTables()/*:void*/
    {
        Config::updateDB();
    }
}
