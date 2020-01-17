<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\AbstractFactory;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\AbstractRepository;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\Config;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class Repository
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Repository extends AbstractRepository
{

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
        parent::__construct();
    }


    /**
     * @inheritDoc
     *
     * @return Factory
     */
    public function factory() : AbstractFactory
    {
        return Factory::getInstance();
    }


    /**
     * @inheritDoc
     */
    protected function getTableName() : string
    {
        return "ui_uihk_crsmgrc_config";
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        return [
            ConfigFormGUI::KEY_COLOR_ADMIN_BACKGROUND  => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_ADMIN_FONT        => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_TUTOR_BACKGROUND  => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_TUTOR_FONT        => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_MEMBER_BACKGROUND => Config::TYPE_STRING,
            ConfigFormGUI::KEY_COLOR_MEMBER_FONT       => Config::TYPE_STRING
        ];
    }
}
