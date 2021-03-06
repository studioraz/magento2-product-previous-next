<?php
/**
 * Copyright © 2017 Studio Raz. All rights reserved.
 * For more information contact us at dev@studioraz.co.il
 * See COPYING_STUIDRAZ.txt for license details.
 */
namespace SR\PreviousNextNavigation\Block\Catalog\Product;

use Magento\Framework\View\Element\Template;
use \SR\PreviousNextNavigation\Helper\Data;

/**
 * Class PrevNextLink
 * @package SR\PreviousNextNavigation\Block\Catalog\Product
 */
class PrevNextLink extends Template
{
    /**
     * @var \Magento\Catalog\Api\Data\ProductInterface
     */
    protected $_product;

    /**
     * @var \SR\PreviousNextNavigation\Helper\Data
     */
    protected $_helper;

    /**
     * PrevNextLink constructor.
     *
     * @param Template\Context $context
     * @param Data $helper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Data $helper,
        array $data = []
    )
    {
        $this->_helper = $helper;
        parent::__construct($context, $data);
    }

    /**
     * Loads product model for data retreiving.
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        if ($this->getIsNext()) {
            $this->_product = $this->_helper->getNextProduct();
        } else {
            $this->_product = $this->_helper->getPreviousProduct();
        }

        return parent::_prepareLayout(); // TODO: Change the autogenerated stub
    }

    /**
     * Return next/prev product title.
     *
     * @return string|bool
     */
    public function getTitle()
    {

        if ($this->_product) {
            return $this->_product->getName();
        }
        return false;
    }

    /**
     * Return next/prev product URL.
     *
     * @return string|bool
     */
    public function getProductUrl()
    {
        if ($this->_product) {
            return $this->_product->getProductUrl();
        }
        return false;
    }

    /**
     * Check if next/prev product exists.
     *
     * @return bool
     */
    public function isProductExists()
    {
        return (bool)$this->_product;
    }


}