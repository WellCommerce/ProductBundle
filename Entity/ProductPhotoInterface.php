<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\ProductBundle\Entity;

use WellCommerce\Bundle\AppBundle\Entity\HierarchyAwareInterface;
use WellCommerce\Bundle\CoreBundle\Entity\TimestampableInterface;
use WellCommerce\Bundle\CoreBundle\Entity\EntityInterface;
use WellCommerce\Bundle\MediaBundle\Entity\MediaInterface;

/**
 * Interface PhotoInterface
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface ProductPhotoInterface extends EntityInterface, TimestampableInterface, ProductAwareInterface, HierarchyAwareInterface
{
    public function getPhoto() : MediaInterface;

    public function setPhoto(MediaInterface $photo);

    public function isMainPhoto() : bool;

    public function setMainPhoto(bool $mainPhoto);
}
