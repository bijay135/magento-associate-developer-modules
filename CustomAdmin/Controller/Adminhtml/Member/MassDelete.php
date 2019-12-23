<?php

namespace Exam\CustomAdmin\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Ui\Component\MassAction\Filter;
use Exam\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class MassDelete extends Action {
    protected $filter;
    protected $collectionFactory;
    protected $resultRedirectFactory;

    public function __construct(Filter $filter,CollectionFactory $collectionFactory, RedirectFactory $resultRedirectFactory, Action\Context $context) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function execute() {
        $collection =  $this->filter->getCollection($this->collectionFactory->create());
        $size = $collection->getSize();

         foreach($collection as $item) {
             $item->delete();
         }

         $this->messageManager->addSuccessMessage(_('A total of '.$size.' items has been deleted'));
         $resultRedirect = $this->resultRedirectFactory->create();

         return $resultRedirect->setPath('*/*/index');
    }
}