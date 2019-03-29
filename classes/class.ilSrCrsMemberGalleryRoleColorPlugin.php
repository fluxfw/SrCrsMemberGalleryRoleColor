<?php

require_once __DIR__ . "/../vendor/autoload.php";

use srag\DIC\SrCrsMemberGalleryRoleColor\Util\LibraryLanguageInstaller;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Config\Config;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;
use srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor\PluginUninstallTrait;

/**
 * Class ilSrCrsMemberGalleryRoleColorPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin {

	use PluginUninstallTrait;
	use SrCrsMemberGalleryRoleColorTrait;
	const PLUGIN_ID = "srcrsmgrc";
	const PLUGIN_NAME = "SrCrsMemberGalleryRoleColor";
	const PLUGIN_CLASS_NAME = self::class;
	const REMOVE_PLUGIN_DATA_CONFIRM_CLASS_NAME = SrCrsMemberGalleryRoleColorRemoveDataConfirm::class;
	/**
	 * @var self|null
	 */
	protected static $instance = null;


	/**
	 * @return self
	 */
	public static function getInstance(): self {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * ilSrCrsMemberGalleryRoleColorPlugin constructor
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
	public function updateLanguages($a_lang_keys = null) {
		parent::updateLanguages($a_lang_keys);

		LibraryLanguageInstaller::getInstance()->withPlugin(self::plugin())->withLibraryLanguageDirectory(__DIR__
			. "/../vendor/srag/removeplugindataconfirm/lang")->updateLanguages();
	}


	/**
	 * @inheritdoc
	 */
	protected function deleteData()/*: void*/ {
		self::dic()->database()->dropTable(Config::TABLE_NAME, false);
	}
}
