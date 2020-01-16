<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilColorPickerInputGUI;
use ilSrCrsMemberGalleryRoleColorConfigGUI;
use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\PropertyFormGUI\PropertyFormGUI;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends PropertyFormGUI
{

    use SrCrsMemberGalleryRoleColorTrait;
    const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
    const LANG_MODULE = ilSrCrsMemberGalleryRoleColorConfigGUI::LANG_MODULE;


    /**
     * ConfigFormGUI constructor
     *
     * @param ilSrCrsMemberGalleryRoleColorConfigGUI $parent
     */
    public function __construct(ilSrCrsMemberGalleryRoleColorConfigGUI $parent)
    {
        parent::__construct($parent);
    }


    /**
     * @inheritDoc
     */
    protected function getValue(/*string*/ $key)
    {
        switch ($key) {
            default:
                return Config::getField($key);
        }
    }


    /**
     * @inheritDoc
     */
    protected function initCommands()/*: void*/
    {
        $this->addCommandButton(ilSrCrsMemberGalleryRoleColorConfigGUI::CMD_UPDATE_CONFIGURE, $this->txt("save"));
    }


    /**
     * @inheritDoc
     */
    protected function initFields()/*: void*/
    {
        $this->fields = [
            Config::KEY_COLOR_ADMIN_BACKGROUND  => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            Config::KEY_COLOR_ADMIN_FONT        => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            Config::KEY_COLOR_TUTOR_BACKGROUND  => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            Config::KEY_COLOR_TUTOR_FONT        => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            Config::KEY_COLOR_MEMBER_BACKGROUND => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            Config::KEY_COLOR_MEMBER_FONT       => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ]
        ];
    }


    /**
     * @inheritDoc
     */
    protected function initId()/*: void*/
    {

    }


    /**
     * @inheritDoc
     */
    protected function initTitle()/*: void*/
    {
        $this->setTitle($this->txt("configuration"));
    }


    /**
     * @inheritDoc
     */
    protected function storeValue(/*string*/ $key, $value)/*: void*/
    {
        switch ($key) {
            default:
                Config::setField($key, $value);
                break;
        }
    }
}
