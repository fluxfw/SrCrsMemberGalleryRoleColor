<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Form;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\ColorPickerInputGUI\ColorPickerInputGUI;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\FormBuilder\AbstractFormBuilder;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\InputGUIWrapperUIInputComponent\InputGUIWrapperUIInputComponent;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\ConfigCtrl;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class FormBuilder
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Form
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class FormBuilder extends AbstractFormBuilder
{

    use SrCrsMemberGalleryRoleColorTrait;

    const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
    const KEY_COLOR_ADMIN_BACKGROUND = "color_admin_background";
    const KEY_COLOR_ADMIN_FONT = "color_admin_font";
    const KEY_COLOR_TUTOR_BACKGROUND = "color_tutor_background";
    const KEY_COLOR_TUTOR_FONT = "color_tutor_font";
    const KEY_COLOR_MEMBER_BACKGROUND = "color_member_background";
    const KEY_COLOR_MEMBER_FONT = "color_member_font";


    /**
     * @inheritDoc
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
    protected function getButtons() : array
    {
        $buttons = [
            ConfigCtrl::CMD_UPDATE_CONFIGURE => self::plugin()->translate("save", ConfigCtrl::LANG_MODULE)
        ];

        return $buttons;
    }


    /**
     * @inheritDoc
     */
    protected function getData() : array
    {
        $data = [
            self::KEY_COLOR_ADMIN_BACKGROUND  => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_ADMIN_BACKGROUND),
            self::KEY_COLOR_ADMIN_FONT        => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_ADMIN_FONT),
            self::KEY_COLOR_MEMBER_BACKGROUND => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_MEMBER_BACKGROUND),
            self::KEY_COLOR_MEMBER_FONT       => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_MEMBER_FONT),
            self::KEY_COLOR_TUTOR_BACKGROUND  => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_TUTOR_BACKGROUND),
            self::KEY_COLOR_TUTOR_FONT        => self::srCrsMemberGalleryRoleColor()->config()->getValue(self::KEY_COLOR_TUTOR_FONT)
        ];

        return $data;
    }


    /**
     * @inheritDoc
     */
    protected function getFields() : array
    {
        $fields = [
            self::KEY_COLOR_ADMIN_BACKGROUND  => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_ADMIN_BACKGROUND, ConfigCtrl::LANG_MODULE))))->withRequired(true),
            self::KEY_COLOR_ADMIN_FONT        => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_ADMIN_FONT, ConfigCtrl::LANG_MODULE))))->withRequired(true),
            self::KEY_COLOR_MEMBER_BACKGROUND => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_MEMBER_BACKGROUND, ConfigCtrl::LANG_MODULE))))->withRequired(true),
            self::KEY_COLOR_MEMBER_FONT       => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_MEMBER_FONT, ConfigCtrl::LANG_MODULE))))->withRequired(true),
            self::KEY_COLOR_TUTOR_BACKGROUND  => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_TUTOR_BACKGROUND, ConfigCtrl::LANG_MODULE))))->withRequired(true),
            self::KEY_COLOR_TUTOR_FONT        => (new InputGUIWrapperUIInputComponent(new ColorPickerInputGUI(self::plugin()
                ->translate(self::KEY_COLOR_TUTOR_FONT, ConfigCtrl::LANG_MODULE))))->withRequired(true)
        ];

        foreach ($fields as $field) {
            $field->getInput()->setDefaultColor("");
        }

        return $fields;
    }


    /**
     * @inheritDoc
     */
    protected function getTitle() : string
    {
        return self::plugin()->translate("configuration", ConfigCtrl::LANG_MODULE);
    }


    /**
     * @inheritDoc
     */
    protected function storeData(array $data)/* : void*/
    {
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_ADMIN_BACKGROUND, strval($data[self::KEY_COLOR_ADMIN_BACKGROUND]));
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_ADMIN_FONT, strval($data[self::KEY_COLOR_ADMIN_FONT]));
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_MEMBER_BACKGROUND, strval($data[self::KEY_COLOR_MEMBER_BACKGROUND]));
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_MEMBER_FONT, strval($data[self::KEY_COLOR_MEMBER_FONT]));
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_TUTOR_BACKGROUND, strval($data[self::KEY_COLOR_TUTOR_BACKGROUND]));
        self::srCrsMemberGalleryRoleColor()->config()->setValue(self::KEY_COLOR_TUTOR_FONT, strval($data[self::KEY_COLOR_TUTOR_FONT]));
    }
}
