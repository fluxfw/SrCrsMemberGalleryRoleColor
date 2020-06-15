<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\AbstractFactory;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\AbstractRepository;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\Config;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Form\FormBuilder;
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
     * @var self|null
     */
    protected static $instance = null;


    /**
     * Repository constructor
     */
    protected function __construct()
    {
        parent::__construct();
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
    protected function getFields() : array
    {
        return [
            FormBuilder::KEY_COLOR_ADMIN_BACKGROUND  => Config::TYPE_STRING,
            FormBuilder::KEY_COLOR_ADMIN_FONT        => Config::TYPE_STRING,
            FormBuilder::KEY_COLOR_TUTOR_BACKGROUND  => Config::TYPE_STRING,
            FormBuilder::KEY_COLOR_TUTOR_FONT        => Config::TYPE_STRING,
            FormBuilder::KEY_COLOR_MEMBER_BACKGROUND => Config::TYPE_STRING,
            FormBuilder::KEY_COLOR_MEMBER_FONT       => Config::TYPE_STRING
        ];
    }


    /**
     * @inheritDoc
     */
    protected function getTableName() : string
    {
        return "ui_uihk_crsmgrc_config";
    }
}
