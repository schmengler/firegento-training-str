<?php

namespace FireGento\SetupDemo\Setup;

use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData110
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

    public function upgrade(ModuleDataSetupInterface $setup)
    {
        $this->config->saveConfig('general/store_information/name', 'FireGento Mega Store', 'default', 0);
    }

}