<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilColorPickerInputGUI;
use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\ActiveRecordConfigFormGUI;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class ConfigFormGUI
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ConfigFormGUI extends ActiveRecordConfigFormGUI {

	use SrCrsMemberGalleryRoleColorTrait;
	const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
	const CONFIG_CLASS_NAME = Config::class;


	/**
	 * @inheritdoc
	 */
	protected function initFields()/*: void*/ {
		$this->fields = [
			Config::KEY_COLOR_ADMIN_BACKGROUND => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			],
			Config::KEY_COLOR_ADMIN_FONT => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			],
			Config::KEY_COLOR_TUTOR_BACKGROUND => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			],
			Config::KEY_COLOR_TUTOR_FONT => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			],
			Config::KEY_COLOR_MEMBER_BACKGROUND => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			],
			Config::KEY_COLOR_MEMBER_FONT => [
				self::PROPERTY_CLASS => ilColorPickerInputGUI::class,
				self::PROPERTY_REQUIRED => true,
				"setDefaultColor" => ""
			]
		];
	}
}
