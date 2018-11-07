<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\RemovePluginDataConfirm\AbstractRemovePluginDataConfirm;

/**
 * Class CrsMemberGalleryRoleColorConfirm
 *
 * @author            studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy CrsMemberGalleryRoleColorConfirm: ilUIPluginRouterGUI
 */
class CrsMemberGalleryRoleColorConfirm extends AbstractRemovePluginDataConfirm {

	const PLUGIN_CLASS_NAME = ilCrsMemberGalleryRoleColorPlugin::class;
}
