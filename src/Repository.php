<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\DIC\SrCrsMemberGalleryRoleColor\DICTrait;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Repository as ConfigRepository;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor
 */
final class Repository
{

    use DICTrait;
    use SrCrsMemberGalleryRoleColorTrait;

    const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Repository constructor
     */
    private function __construct()
    {

    }


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
     * @return ConfigRepository
     */
    public function config() : ConfigRepository
    {
        return ConfigRepository::getInstance();
    }


    /**
     *
     */
    public function dropTables()/*:void*/
    {
        $this->config()->dropTables();
    }


    /**
     *
     */
    public function installTables()/*:void*/
    {
        $this->config()->installTables();
    }
}
