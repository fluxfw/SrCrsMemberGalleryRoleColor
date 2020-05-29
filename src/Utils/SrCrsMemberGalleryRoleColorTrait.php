<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Utils;

use srag\Plugins\SrCrsMemberGalleryRoleColor\Repository;

/**
 * Trait SrCrsMemberGalleryRoleColorTrait
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Utils
 *
 * @author  studer + raimann ag - Team Custom 1 <support-custom1@studer-raimann.ch>
 */
trait SrCrsMemberGalleryRoleColorTrait
{

    /**
     * @return Repository
     */
    protected static function srCrsMemberGalleryRoleColor() : Repository
    {
        return Repository::getInstance();
    }
}
