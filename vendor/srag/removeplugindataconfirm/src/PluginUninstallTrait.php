<?php

namespace srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor;

use srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor\Exception\RemovePluginDataConfirmException;

/**
 * Trait PluginUninstallTrait
 *
 * @package srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait PluginUninstallTrait {

	use AbstractPluginUninstallTrait;


	/**
	 * @return bool
	 * @throws RemovePluginDataConfirmException
	 *
	 * @internal
	 */
	protected final function beforeUninstall()/*: bool*/ {
		return $this->pluginUninstall();
	}


	/**
	 * @internal
	 */
	protected final function afterUninstall()/*: void*/ {

	}
}