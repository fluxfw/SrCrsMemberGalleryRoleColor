<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\DICTrait;

/**
 * CrsMemberGalleryRoleColor Plugin
 */
class ilCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin {

	use DICTrait;
	const PLUGIN_CLASS_NAME = self::class;
	const PLUGIN_ID = "crsmgrc";
	const PLUGIN_NAME = "CrsMemberGalleryRoleColor";
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
	 * @return string
	 */
	public function getPluginName(): string {
		return self::PLUGIN_NAME;
	}


	/**
	 * @return bool
	 */
	protected function beforeUninstall(): bool {
		return true;
	}
}
