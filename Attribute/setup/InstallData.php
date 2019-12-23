<?php

namespace Exam\Attribute\setup;

use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * Installs data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Zend_Validate_Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_eav',
            [
                'group'=>'Content',
                'type'=>'text',
                'backend'=>\Exam\Attribute\Model\Config\Validation::class,
                'global'=>\Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'=>true,
                'required'=>true,
                'searchable'=>false,
                'used_in_product_listing'=>true,
                'label'=>'Custom EAV',
                'input'=>'text'
            ]
        );

        $eavSetup = $this->eavSetupFactory->create(['setup'=>$setup]);
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'member_type',
            [
                'group'=>'Content',
                'type'=>'text',
                'global'=>\Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible'=>true,
                'required'=>false,
                'searchable'=>false,
                'used_in_product_listing'=>true,
                'label'=>'Member Type',
                'input'=>'select',
                'source'=>\Exam\Attribute\Model\Config\Options::class
            ]
        );

        $setup->endSetup();
    }
}