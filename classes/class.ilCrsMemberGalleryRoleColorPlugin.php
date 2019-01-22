<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\RemovePluginDataConfirm\CrsMemberGalleryRoleColor\PluginUninstallTrait;
use srag\UNIBAS\Plugins\CrsMemberGalleryRoleColor\Utils\CrsMemberGalleryRoleColorTrait;

/**
 * Class ilCrsMemberGalleryRoleColorPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin {

	use PluginUninstallTrait;
	use CrsMemberGalleryRoleColorTrait;
	const PLUGIN_ID = "crsmgrc";
	const PLUGIN_NAME = "CrsMemberGalleryRoleColor";
	const PLUGIN_CLASS_NAME = self::class;
	const REMOVE_PLUGIN_DATA_CONFIRM = false;
	const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = CrsMemberGalleryRoleColorConfirm::class;
	/**
	 * @var self|null
	 */
	protected static $instance = NULL;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === NULL) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * ilCrsMemberGalleryRoleColorPlugin constructor
	 */
	public function __construct() {
		parent::__construct();
	}


	/**
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}


	/**
	 * @inheritdoc
	 */
	protected function deleteData()/*: void*/ {
		// Nothing to delete
	}
}
