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

namespace WellCommerce\Bundle\ProductBundle\EventListener;

use Composer\EventDispatcher\EventSubscriberInterface;

/**
 * Class ProductSubscriber
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductSubscriber implements EventSubscriberInterface
{
    
    public static function getSubscribedEvents()
    {
        return [
        ];
    }
}
