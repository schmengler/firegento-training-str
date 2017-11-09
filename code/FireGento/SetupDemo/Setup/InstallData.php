<?php

namespace FireGento\SetupDemo\Setup;

use Magento\Framework\App\Config\MutableScopeConfigInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /** @var \Magento\Config\Model\ResourceModel\Config */
    private $config;

    /**
     * InstallData constructor.
     * @param \Magento\Config\Model\ResourceModel\Config $config
     */
    public function __construct(\Magento\Config\Model\ResourceModel\Config $config)
    {
        $this->config = $config;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $this->config->saveConfig('general/store_information/name', 'FireGento Store', 'default', 0);
    }

}