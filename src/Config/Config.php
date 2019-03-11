<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\ActiveRecordConfig;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class Config
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class Config extends ActiveRecordConfig {

	use SrCrsMemberGalleryRoleColorTrait;
	const TABLE_NAME = "ui_uihk_srcrsmgrc_config";
	const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
	const KEY_COLOR_ADMIN_BACKGROUND = "color_admin_background";
	const KEY_COLOR_ADMIN_FONT = "color_admin_font";
	const KEY_COLOR_TUTOR_BACKGROUND = "color_tutor_background";
	const KEY_COLOR_TUTOR_FONT = "color_tutor_font";
	const KEY_COLOR_MEMBER_BACKGROUND = "color_member_background";
	const KEY_COLOR_MEMBER_FONT = "color_member_font";
	/**
	 * @var array
	 */
	protected static $fields = [
		self::KEY_COLOR_ADMIN_BACKGROUND => self::TYPE_STRING,
		self::KEY_COLOR_ADMIN_FONT => self::TYPE_STRING,
		self::KEY_COLOR_TUTOR_BACKGROUND => self::TYPE_STRING,
		self::KEY_COLOR_TUTOR_FONT => self::TYPE_STRING,
		self::KEY_COLOR_MEMBER_BACKGROUND => self::TYPE_STRING,
		self::KEY_COLOR_MEMBER_FONT => self::TYPE_STRING
	];
}
