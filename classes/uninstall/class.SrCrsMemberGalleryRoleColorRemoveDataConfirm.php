<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;
use srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor\AbstractRemovePluginDataConfirm;

/**
 * Class SrCrsMemberGalleryRoleColorRemoveDataConfirm
 *
 * @author            studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy SrCrsMemberGalleryRoleColorRemoveDataConfirm: ilUIPluginRouterGUI
 */
class SrCrsMemberGalleryRoleColorRemoveDataConfirm extends AbstractRemovePluginDataConfirm {

	use SrCrsMemberGalleryRoleColorTrait;
	const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
}
