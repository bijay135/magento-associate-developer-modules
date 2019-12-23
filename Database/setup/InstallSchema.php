<?php


namespace Exam\Database\setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface {
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     * @return void
     * @throws \Zend_Db_Exception
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $setup->startSetup();

        $table = $setup->getConnection()->newTable(
            $setup->getTable('affiliate_member')
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity'=>true,'nullable'=>false,'primary'=>true],
                'MEMBER ID'
            )->addColumn(
                'name',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>false],
                'NAME OF MEMBER'
            )->addColumn(
                'address',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>false],
                'ADDRESS OF MEMEBER'
            )->addColumn(
                'status',
                Table::TYPE_BOOLEAN,
                10,
                ['nullable'=>false,'default'=>false],
                'STATUS'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable'=>false,'default'=>Table::TIMESTAMP_INIT],
                'TIME CREATED'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable'=>false,'default'=>Table::TIMESTAMP_UPDATE],
                'TIME FOR UPDATE'
            )->setComment(
                'Affiliate Member table'
            );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}