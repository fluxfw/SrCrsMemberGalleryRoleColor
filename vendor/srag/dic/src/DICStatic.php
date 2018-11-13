<?php

namespace srag\DIC\CrsMemberGalleryRoleColor;

use ilLogLevel;
use ilPlugin;
use League\Flysystem\PluginInterface;
use srag\DIC\CrsMemberGalleryRoleColor\DIC\DICInterface;
use srag\DIC\CrsMemberGalleryRoleColor\DIC\LegacyDIC;
use srag\DIC\CrsMemberGalleryRoleColor\DIC\NewDIC;
use srag\DIC\CrsMemberGalleryRoleColor\Exception\DICException;
use srag\DIC\CrsMemberGalleryRoleColor\Plugin\Plugin;
use srag\DIC\CrsMemberGalleryRoleColor\Version\Version;
use srag\DIC\CrsMemberGalleryRoleColor\Version\VersionInterface;

/**
 * Class DICStatic
 *
 * @package srag\DIC\CrsMemberGalleryRoleColor
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class DICStatic implements DICStaticInterface {

	/**
	 * @var DICInterface|null
	 */
	private static $dic = NULL;
	/**
	 * @var PluginInterface[]
	 */
	private static $plugins = [];
	/**
	 * @var VersionInterface|null
	 */
	private static $version = NULL;


	/**
	 * @inheritdoc
	 */
	public static function dic()/*: DICInterface*/ {
		if (self::$dic === NULL) {
			if (self::version()->is52()) {
				global $DIC;
				self::$dic = new NewDIC($DIC);
			} else {
				global $GLOBALS;
				self::$dic = new LegacyDIC($GLOBALS);
			}
		}

		return self::$dic;
	}


	/**
	 * @inheritdoc
	 */
	public static function plugin(/*string*/
		$plugin_class_name)/*: PluginInterface*/ {
		if (!isset(self::$plugins[$plugin_class_name])) {
			if (!class_exists($plugin_class_name)) {
				throw new DICException("Class $plugin_class_name not exists!");
			}

			if (method_exists($plugin_class_name, "getInstance")) {
				$plugin_object = $plugin_class_name::getInstance();
			} else {
				$plugin_object = new $plugin_class_name();

				self::dic()->log()->write("DICLog: Please implement $plugin_class_name::getInstance()!", ilLogLevel::DEBUG);
			}

			if (!$plugin_object instanceof ilPlugin) {
				throw new DICException("Class $plugin_class_name not extends ilPlugin!");
			}

			self::$plugins[$plugin_class_name] = new Plugin($plugin_object);
		}

		return self::$plugins[$plugin_class_name];
	}


	/**
	 * @inheritdoc
	 */
	public static function version()/*: VersionInterface*/ {
		if (self::$version === NULL) {
			self::$version = new Version();
		}

		return self::$version;
	}


	/**
	 * DICStatic constructor
	 */
	private function __construct() {

	}
}
