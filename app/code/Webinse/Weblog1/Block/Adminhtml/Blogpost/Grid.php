<?php
namespace Webinse\Weblog1\Block\Adminhtml\Blogpost;

class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Webinse\Weblog1\Model\ResourceModel\Blogpost\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Webinse\Weblog1\Model\ResourceModel\Blogpost\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Webinse\Weblog1\Model\ResourceModel\Blogpost\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $backendHelper, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('blogpostGrid');
        $this->setDefaultSort('blogpost_id');
        $this->setDefaultDir('ASC');
    }

    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        parent::_prepareColumns();

        $this->addColumn(
            'blogpost_id',
            [
                'header' => __('ID'),
                'sortable' => true,
                'index' => 'blogpost_id',
                'type' => 'number',
            ]
        );

        $this->addColumn(
            'title',
            [
                'header' => __('Title'),
                'sortable' => true,
                'index' => 'title',
                'type' => 'text',
            ]
        );

        $this->addColumn(
            'post',
            [
                'header' => __('Post'),
                'sortable' => true,
                'index' => 'post',
                'type' => 'text',
                'truncate' => 50,
            ]
        );

        $this->addColumn(
            'date',
            [
                'header' => __('Date'),
                'sortable' => true,
                'index' => 'date',
                'type' => 'date',
            ]
        );

        return $this;
    }

    public function getRowUrl($row)
    {
        return $this->getUrl('webinse_weblog1/blogpost/edit', ['blogpost_id' => $row->getBlogpostId()]);
    }
}