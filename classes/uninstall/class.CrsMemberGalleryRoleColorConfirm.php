<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use srag\RemovePluginDataConfirm\AbstractRemovePluginDataConfirm;

/**
 * Class CrsMemberGalleryRoleColorConfirm
 *
 * @author            studer + raimann ag <support-custom1@studer-raimann.ch>
 *
 * @ilCtrl_isCalledBy CrsMemberGalleryRoleColorConfirm: ilUIPluginRouterGUI
 */
class CrsMemberGalleryRoleColorConfirm extends AbstractRemovePluginDataConfirm {

	const PLUGIN_CLASS_NAME = ilCrsMemberGalleryRoleColorPlugin::class;


	/**
	 * @inheritdoc
	 */
	public function getUninstallRemovesData()/*: ?bool*/ {
		// TODO:
	}


	/**
	 * @inheritdoc
	 */
	public function setUninstallRemovesData(/*bool*/
		$uninstall_removes_data)/*: void*/ {
		// TODO:
	}


	/**
	 * @inheritdoc
	 */
	public function removeUninstallRemovesData()/*: void*/ {
		// TODO:
	}
}
