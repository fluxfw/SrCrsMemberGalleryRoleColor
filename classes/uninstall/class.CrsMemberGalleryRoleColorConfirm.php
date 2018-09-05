<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\RemovePluginDataConfirm\AbstractRemovePluginDataConfirm;

/**
 * Class CrsMemberGalleryRoleColorConfirm
 *
 * @ilCtrl_isCalledBy CrsMemberGalleryRoleColorConfirm: ilUIPluginRouterGUI
 */
class CrsMemberGalleryRoleColorConfirm extends AbstractRemovePluginDataConfirm {

	const PLUGIN_CLASS_NAME = ilCrsMemberGalleryRoleColorPlugin::class;


	/**
	 * @inheritdoc
	 */
	public function removeUninstallRemovesData() {
		// TODO:
	}


	/**
	 * @inheritdoc
	 */
	public function getUninstallRemovesData() {
		// TODO:
	}


	/**
	 * @inheritdoc
	 */
	public function setUninstallRemovesData($uninstall_removes_data) {
		// TODO:
	}
}
