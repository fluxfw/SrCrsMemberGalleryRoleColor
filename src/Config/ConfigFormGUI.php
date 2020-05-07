<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilColorPickerInputGUI;
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
    const KEY_COLOR_ADMIN_BACKGROUND = "color_admin_background";
    const KEY_COLOR_ADMIN_FONT = "color_admin_font";
    const KEY_COLOR_TUTOR_BACKGROUND = "color_tutor_background";
    const KEY_COLOR_TUTOR_FONT = "color_tutor_font";
    const KEY_COLOR_MEMBER_BACKGROUND = "color_member_background";
    const KEY_COLOR_MEMBER_FONT = "color_member_font";
    const LANG_MODULE = ConfigCtrl::LANG_MODULE;


    /**
     * ConfigFormGUI constructor
     *
     * @param ConfigCtrl $parent
     */
    public function __construct(ConfigCtrl $parent)
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
                return self::srCrsMemberGalleryRoleColor()->config()->getValue($key);
        }
    }


    /**
     * @inheritDoc
     */
    protected function initCommands()/*: void*/
    {
        $this->addCommandButton(ConfigCtrl::CMD_UPDATE_CONFIGURE, $this->txt("save"));
    }


    /**
     * @inheritDoc
     */
    protected function initFields()/*: void*/
    {
        $this->fields = [
            self::KEY_COLOR_ADMIN_BACKGROUND  => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            self::KEY_COLOR_ADMIN_FONT        => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            self::KEY_COLOR_TUTOR_BACKGROUND  => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            self::KEY_COLOR_TUTOR_FONT        => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            self::KEY_COLOR_MEMBER_BACKGROUND => [
                self::PROPERTY_CLASS    => ilColorPickerInputGUI::class,
                self::PROPERTY_REQUIRED => true,
                "setDefaultColor"       => ""
            ],
            self::KEY_COLOR_MEMBER_FONT       => [
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
                self::srCrsMemberGalleryRoleColor()->config()->setValue($key, $value);
                break;
        }
    }
}
