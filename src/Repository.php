<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\Config;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\Repository as ConfigRepository;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Utils\ConfigTrait;
use srag\DIC\SrCrsMemberGalleryRoleColor\DICTrait;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\ConfigFormGUI;
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
    use ConfigTrait {
        config as protected _config;
    }
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
        $this->config()->withTableName("ui_uihk_crsmgrc_config")->withFields([
            ConfigFormGUI::KEY_COLOR_ADMIN_BACKGROUND  => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_ADMIN_FONT        => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_TUTOR_BACKGROUND  => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_TUTOR_FONT        => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_MEMBER_BACKGROUND => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_MEMBER_FONT       => Config::TYPE_STRING
        ]);
    }


    /**
     * @inheritDoc
     */
    public function config() : ConfigRepository
    {
        return self::_config();
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
