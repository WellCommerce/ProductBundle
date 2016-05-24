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

namespace WellCommerce\Bundle\ProductBundle\Controller\Front;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use WellCommerce\Bundle\CategoryBundle\Entity\CategoryInterface;
use WellCommerce\Bundle\CoreBundle\Controller\Front\AbstractFrontController;
use WellCommerce\Bundle\ProductBundle\Entity\ProductInterface;
use WellCommerce\Component\Breadcrumb\Model\Breadcrumb;

/**
 * Class ProductController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductController extends AbstractFrontController
{
    public function indexAction(ProductInterface $product) : Response
    {
        $this->addBreadcrumbs($product);
        $this->getProductStorage()->setCurrentProduct($product);

        return $this->displayTemplate('index', [
            'product' => $product
        ]);
    }
    
    public function viewAction(ProductInterface $product) : JsonResponse
    {
        $this->getProductStorage()->setCurrentProduct($product);

        $templateData       = $this->get('product.helper')->getProductDefaultTemplateData($product);
        $basketModalContent = $this->renderView('WellCommerceProductBundle:Front/Product:view.html.twig', $templateData);

        return $this->jsonResponse([
            'basketModalContent' => $basketModalContent,
            'templateData'       => $templateData
        ]);
    }

    private function addBreadcrumbs(ProductInterface $product)
    {
        $category = $product->getCategories()->last();
        $paths    = $this->get('category.repository')->getCategoryPath($category);

        /** @var CategoryInterface $path */
        foreach ($paths as $path) {
            $this->getBreadcrumbProvider()->add(new Breadcrumb([
                'label' => $path->translate()->getName(),
                'url'   => $this->getRouterHelper()->generateUrl($path->translate()->getRoute()->getId())
            ]));
        }

        $this->getBreadcrumbProvider()->add(new Breadcrumb([
            'label' => $product->translate()->getName(),
        ]));
    }
}
