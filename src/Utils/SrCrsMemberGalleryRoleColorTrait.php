<?php

namespace srag\Plugins\SrCrsMemberGalleryRoleColor\Utils;

use srag\Plugins\SrCrsMemberGalleryRoleColor\Repository;

/**
 * Trait SrCrsMemberGalleryRoleColorTrait
 *
 * @package srag\Plugins\SrCrsMemberGalleryRoleColor\Utils
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
