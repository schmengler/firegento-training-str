<?php

namespace FireGento\SetupDemo\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface
{
    /**
     * @var UpgradeData110
     */
    private $upgrade110;

    /**
     * UpgradeData constructor.
     * @param UpgradeData110 $upgrade110
     */
    public function __construct(UpgradeData110 $upgrade110)
    {
        $this->upgrade110 = $upgrade110;
    }

    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.1.0', '<')) {
            $this->upgrade110->upgrade($setup);
        }
    }

}