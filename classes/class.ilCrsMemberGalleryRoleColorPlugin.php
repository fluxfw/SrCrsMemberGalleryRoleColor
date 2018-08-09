<?php
require_once __DIR__ . "/../vendor/autoload.php";

/**
 * CrsMemberGalleryRoleColor Plugin
 */
class ilCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin {

	const PLUGIN_ID = "crsmgrc";
	const PLUGIN_NAME = "CrsMemberGalleryRoleColor";
	/**
	 * @var ilCrsMemberGalleryRoleColorPlugin
	 */
	protected static $instance = NULL;


	/**
	 * @return ilCrsMemberGalleryRoleColorPlugin
	 */
	public static function getInstance(): ilCrsMemberGalleryRoleColorPlugin {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}
}
