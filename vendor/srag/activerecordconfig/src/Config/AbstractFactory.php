<?php

namespace srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config;

use srag\DIC\SrCrsMemberGalleryRoleColor\DICTrait;

/**
 * Class AbstractFactory
 *
 * @package srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config
 */
abstract class AbstractFactory
{

    use DICTrait;

    /**
     * AbstractFactory constructor
     */
    protected function __construct()
    {

    }


    /**
     * @return Config
     */
    public function newInstance() : Config
    {
        $config = new Config();

        return $config;
    }
}
