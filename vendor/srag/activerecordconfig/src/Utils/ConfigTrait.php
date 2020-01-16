<?php

namespace srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Utils;

use srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Config\Repository as ConfigRepository;

/**
 * Trait ConfigTrait
 *
 * @package srag\ActiveRecordConfig\SrCrsMemberGalleryRoleColor\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait ConfigTrait
{

    /**
     * @return ConfigRepository
     */
    protected static function config() : ConfigRepository
    {
        return ConfigRepository::getInstance();
    }
}
