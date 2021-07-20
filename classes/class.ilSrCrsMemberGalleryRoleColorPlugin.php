<?php

require_once __DIR__ . "/../vendor/autoload.php";

use ILIAS\DI\Container;
use srag\CustomInputGUIs\SrCrsMemberGalleryRoleColor\Loader\CustomInputGUIsLoaderDetector;
use srag\DevTools\SrCrsMemberGalleryRoleColor\DevToolsCtrl;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;
use srag\RemovePluginDataConfirm\SrCrsMemberGalleryRoleColor\PluginUninstallTrait;

/**
 * Class ilSrCrsMemberGalleryRoleColorPlugin
 */
class ilSrCrsMemberGalleryRoleColorPlugin extends ilUserInterfaceHookPlugin
{

    use PluginUninstallTrait;
    use SrCrsMemberGalleryRoleColorTrait;

    const PLUGIN_CLASS_NAME = self::class;
    const PLUGIN_ID = "srcrsmgrc";
    const PLUGIN_NAME = "SrCrsMemberGalleryRoleColor";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilSrCrsMemberGalleryRoleColorPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


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
     * @inheritDoc
     */
    public function exchangeUIRendererAfterInitialization(Container $dic) : Closure
    {
        return CustomInputGUIsLoaderDetector::exchangeUIRendererAfterInitialization();
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
    public function updateLanguages(/*?array*/ $a_lang_keys = null) : void
    {
        parent::updateLanguages($a_lang_keys);

        $this->installRemovePluginDataConfirmLanguages();

        DevToolsCtrl::installLanguages(self::plugin());
    }


    /**
     * @inheritDoc
     */
    protected function deleteData() : void
    {
        self::srCrsMemberGalleryRoleColor()->dropTables();
    }


    /**
     * @inheritDoc
     */
    protected function shouldUseOneUpdateStepOnly() : bool
    {
        return true;
    }
}
