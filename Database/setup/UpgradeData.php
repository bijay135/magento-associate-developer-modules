<?php

namespace Exam\Database\setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface {
    /**
     * Upgrades data for a module
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();
        if(version_compare($context->getVersion(), '0.3.0','<')){
            $setup->getConnection()->insert(
                $setup->getTable('affiliate_member'),
                ['name'=>'Ade', 'status'=>true, 'address'=>'No 13, Dubai', 'phone_number'=>'9846631582']
            );
        }

        $setup->endSetup();
    }
}