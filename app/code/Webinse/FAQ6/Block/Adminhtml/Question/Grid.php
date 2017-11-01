<?php
namespace Webinse\FAQ6\Block\Adminhtml\Question;

use \Magento\Backend\Block\Template\Context;
use \Magento\Backend\Helper\Data;
use \Magento\Backend\Block\Widget\Grid\Extended as GridExtended;
use \Webinse\FAQ6\Model\ResourceModel\Question\CollectionFactory as CollectionFactory;

class Grid extends GridExtended
{
    /**
     * @var CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param Context $context
     * @param Data $backendHelper
     * @param CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Data $backendHelper,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();

        /**
         * @todo: set grid id and default sort params
         */
        parent::_construct();
        $this->setId('questionGrid');
        $this->setDefaultSort('question_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        /**
         * @todo: init and set questions collection
         */
        $collection = $this->_collectionFactory->create();
        $collection->addUserNameToCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        /**
         * @todo: prepare columns (ID, Question content, Answer, User, Creation Time) for grid;
         *     truncate 'Question content' and 'Answer' columns values to 50 character;
         *     columns values 'user' must contain firstname and lastname from db table admin_user;
         *     use type 'date' for 'Creation Time' column.
         */
        $this->addColumn(
            'question_id',
            [
                'header' => __('ID'),
                'sortable' => true,
                'index' => 'question_id',
                'type' => 'number',
            ]
        );

        $this->addColumn(
            'question_content',
            [
                'header' => __('Question content'),
                'sortable' => true,
                'index' => 'content',
                'type' => 'text',
                'truncate' => 50,
            ]
        );

        $this->addColumn(
            'answer',
            [
                'header' => __('Answer'),
                'sortable' => true,
                'index' => 'answer',
                'type' => 'text',
                'truncate' => 50,
            ]
        );

        $this->addColumn(
            'firstname',
            [
                'header' => __('First Name'),
                'sortable' => true,
                'index' => 'firstname',
                'type' => 'text',
            ]
        );

        $this->addColumn(
            'lastname',
            [
                'header' => __('Last Name'),
                'sortable' => true,
                'index' => 'lastname',
                'type' => 'text',
            ]
        );

        $this->addColumn(
            'creation_time',
            [
                'header' => __('Creation Time'),
                'sortable' => true,
                'index' => 'creation_time',
                'type' => 'date',
            ]
        );

        return $this;
    }

    public function getRowUrl($row)
    {
        /**
         * @todo: return url to edit page
         */
        return $this->getUrl('webinse_faq6/question/edit', ['question_id' => $row->getId()]);
    }

    protected function _getUserFullNameExp()
    {
        return new \Zend_Db_Expr("CONCAT(firstname, ' ', lastname)");
    }
}
