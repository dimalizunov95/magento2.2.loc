<?php
namespace Webinse\Weblog1\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;

    public function __construct(
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Action\Context $context)
    {
        $this->_resultPageFactory = $resultPageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        return $this->_resultPageFactory->create();

        /*$blogpostModel = $this->_blogpostModelFactory->create();
        $posts = $blogpostModel->getCollection();
        foreach ($posts as $blogpost) {
            echo '<h3>'.$blogpost->getTitle().'</h3>';
            echo nl2br($blogpost->getPost());
        }*/

        /*$blogpostModel = $this->_blogpostModelFactory->create();
        $blogpostModel->setTitle('Code Post!');
        $blogpostModel->setPost('This post was created from code!');
        $blogpostModel->save();
        echo 'Post with ID ' . $blogpostModel->getId() . ' created';*/

        /*$blogpostModel = $this->_blogpostModelFactory->create();

        $id = $this->getRequest()->getParam('id');
        if ($id) {
            echo 'Loading the blogpost with an ID of ' . $id;

            $blogpostModel->load($id);
            $data = $blogpostModel->getData();
            var_dump($data);

        } else {
            echo 'Set param "id" in URL';
        }*/
    }
}