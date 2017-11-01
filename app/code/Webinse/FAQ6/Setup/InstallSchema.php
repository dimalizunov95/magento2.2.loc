<?php
/**
 * Webinse
 *
 * PHP Version 5.6.23
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
/**
 * Install DB schema script
 *
 * @category    Webinse
 * @package     Webinse_FAQ6
 * @author      Webinse Team <info@webinse.com>
 * @copyright   2017 Webinse Ltd. (https://www.webinse.com)
 * @license     http://opensource.org/licenses/OSL-3.0 The Open Software License 3.0
 */
namespace Webinse\FAQ6\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Webinse\FAQ6\Api\Data\QuestionInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        /**
         * @todo add table webinse_faq5_question
         *
         * question_id   - int, unsigned, not null, auto increment, primary key
         * content       - text
         * answer        - text
         * creation_time - datetime, not null
         * user_id       - int (current admin ID),
         *                      set foreign key for this field (related with table - 'admin_user', field - 'user_id')
         *                      @see \Magento\User\Setup\InstallSchema
         */
        $table = $setup->getConnection()->newTable(
            $setup->getTable('webinse_blog5_posts')
        )->addColumn(
            'question_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'question_id ID'
        )->addColumn(
            'content',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'content'
        )->addColumn(
            'answer',
            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            255,
            [],
            'answer'
        )->addColumn(
            'creation_time',
            \Magento\Framework\DB\Ddl\Table::TYPE_DATETIME,
            null,
            [],
            'Question Creation Datetime'
        )->addColumn(
            'user_id',
            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
            10,
            ['nullable' => false, 'unsigned' => true,],
            'Creator of the question'
        )->addForeignKey(
            $setup->getFkName(
                'webinse_blog5_posts',
                'user_id',
                'admin_user',
                'user_id'
            ),
            'user_id',
            $setup->getTable('admin_user'),
            'user_id',
            \Magento\Framework\DB\Ddl\Table::ACTION_CASCADE
        )->setComment(
            'Questions Post Table'
        );
        $setup->getConnection()->createTable($table);

        $setup->endSetup();
    }
}
