<?php

namespace FireGento\SetupDemo\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    /**
     * @var EavSetup
     */
    private $eavSetup;

    /**
     * UpgradeSchema constructor.
     * @param EavSetup $eavSetup
     */
    public function __construct(EavSetup $eavSetup)
    {
        $this->eavSetup = $eavSetup;
    }

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $this->eavSetup->addAttribute(Product::ENTITY, 'firegento', [
                'type' => 'varchar'
            ]);
        }
    }

}