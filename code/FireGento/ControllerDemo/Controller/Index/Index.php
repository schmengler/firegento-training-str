<?php

namespace FireGento\ControllerDemo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Result\Layout;
use Magento\Store\Api\Data\StoreConfigInterface;
use Magento\Store\Model\Store;

class Index extends Action
{

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(Context $context, ScopeConfigInterface $scopeConfig)
    {
        parent::__construct($context);
        $this->scopeConfig = $scopeConfig;
    }

    public function execute()
    {
//        /** @var Json $result */
//        $result = $this->resultFactory->create(
//            ResultFactory::TYPE_JSON
//        );
//        $result->setData(
//            [
//                'foo' => 'bar'
//            ]
//        );

        $country = $this->scopeConfig->getValue('general/country/default', 'stores');
        /** @var Layout $result */
        $result = $this->resultFactory->create(
            ResultFactory::TYPE_PAGE
        );
        $result->getLayout()->getBlock('firegento_demo')->setData('foo', $country);
        return $result;
    }
}