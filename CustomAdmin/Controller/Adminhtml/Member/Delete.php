<?php

namespace Exam\CustomAdmin\Controller\Adminhtml\Member;

use Exam\Database\Model\AffiliateMember;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;

class Delete extends Action {
    protected $model;
    protected $resultRedirectFactory;

    public function __construct(AffiliateMember $affiliateMember, Action\Context $context, RedirectFactory $redirectFactory) {
        $this->resultRedirectFactory = $redirectFactory;
        $this->model = $affiliateMember;
        parent::__construct($context);
    }

    protected function _is_allowed(){
        return $this->_authorization->isAllowed('Exam_CustomAdmin::parent');
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute() {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');
        if($id) {
            $model = $this->model;
            $model->load($id);
            try {
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Member Deleted "));
                return $resultRedirect->setPath('*/*/index');
            }
            catch(\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        return $resultRedirect->setPath('*/*/index');
    }
}