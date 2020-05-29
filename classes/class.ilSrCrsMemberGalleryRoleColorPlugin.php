<?php

require_once __DIR__ . "/../vendor/autoload.php";

use ILIAS\DI\Container;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\Loader\CustomInputGUIsLoaderDetector;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;
use srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor\PluginUninstallTrait;

/**
 * Class ilSrCrsMemberGalleryRoleColorPlugin
 *
 * @author studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
class ilSrCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin
{

    use PluginUninstallTrait;
    use SrCrsMemberGalleryRoleColorTrait;

    const PLUGIN_ID = "srcrsmgrc";
    const PLUGIN_NAME = "SrCrsMemberGalleryRoleColor";
    const PLUGIN_CLASS_NAME = self::class;
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * ilSrCrsMemberGalleryRoleColorPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function updateLanguages(/*?array*/ $a_lang_keys = null)/*:void*/
    {
        parent::updateLanguages($a_lang_keys);

        $this->installRemovePluginDataConfirmLanguages();
    }


    /**
     * @inheritDoc
     */
    protected function deleteData()/*: void*/
    {
        self::srCrsMemberGalleryRoleColor()->dropTables();
    }


    /**
     * @inheritDoc
     */
    public function exchangeUIRendererAfterInitialization(Container $dic) : Closure
    {
        return CustomInputGUIsLoaderDetector::exchangeUIRendererAfterInitialization();
    }
}
