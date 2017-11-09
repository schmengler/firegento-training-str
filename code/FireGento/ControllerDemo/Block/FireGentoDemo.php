<?php

namespace FireGento\ControllerDemo\Block;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\View\Element\Template;

class FireGentoDemo extends Template
{
    /**
     * @var CollectionFactory
     */
    private $productCollectionFactory;
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;
    /**
     * @var SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    public function __construct(
        Template\Context $context,
        ProductRepositoryInterface $productRepository,
        CollectionFactory $productCollectionFactory,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->productCollectionFactory = $productCollectionFactory;
        $this->productRepository = $productRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    /**
     * @return ProductInterface[]
     */
    public function getProductCollection()
    {
        $searchCriteria = $this->searchCriteriaBuilder
            ->addFilter('name', '%bag%', 'like')
            ->create();
        return $this->productRepository->getList(
            $searchCriteria
        )->getItems();
//        $productCollection = $this->productCollectionFactory->create();
//        $productCollection->addAttributeToSelect('name');
//        return $productCollection;
    }
}