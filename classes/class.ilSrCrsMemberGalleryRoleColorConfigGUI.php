<?php

use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\ActiveRecordConfigGUI;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\ConfigFormGUI;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class ilSrCrsMemberGalleryRoleColorConfigGUI
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrCrsMemberGalleryRoleColorConfigGUI extends ActiveRecordConfigGUI {

	use SrCrsMemberGalleryRoleColorTrait;
	const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
	/**
	 * @var array
	 */
	protected static $tabs = [ self::TAB_CONFIGURATION => ConfigFormGUI::class ];
}
