<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Config;

use ilSrCrsMemberGalleryRoleColorConfigGUI;
use ilSrCrsMemberGalleryRoleColorPlugin;
use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\AbstractFactory;
use srag\Plugins\SrCrsMemberGalleryRoleColor\Utils\SrCrsMemberGalleryRoleColorTrait;

/**
 * Class Factory
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Config
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
final class Factory extends AbstractFactory
{

    use SrCrsMemberGalleryRoleColorTrait;
    const PLUGIN_CLASS_NAME = ilSrCrsMemberGalleryRoleColorPlugin::class;
    /**
     * @var self
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
     * Factory constructor
     */
    private function __construct()
    {
        parent::__construct();
    }


    /**
     * @param ilSrCrsMemberGalleryRoleColorConfigGUI $parent
     *
     * @return ConfigFormGUI
     */
    public function newFormInstance(ilSrCrsMemberGalleryRoleColorConfigGUI $parent) : ConfigFormGUI
    {
        $form = new ConfigFormGUI($parent);

        return $form;
    }
}
