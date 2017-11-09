<?php

namespace FireGento\PluginDemo\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Psr\Log\LoggerInterface;

class Checkout implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Checkout constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(Observer $observer)
    {
        $this->logger->info(
            print_r(array_keys($observer->getData()), true)
        );
    }

}