<?php

namespace FireGento\PluginDemo\Plugin;

use Psr\Log\LoggerInterface;

class AccountManagementPlugin
{
    /** @var LoggerInterface */
    private $logger;

    /**
     * AccountManagementPlugin constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function beforeAuthenticate(\Magento\Customer\Api\AccountManagementInterface $subject, $email, $password)
    {
        $this->logger->info('Customer tried to log in: ' . $email);
        $email = 'roni_cost@example.com';
        $password = 'roni_cost3@example.com';
        return [$email, $password];
    }
}