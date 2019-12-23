<?php

namespace Exam\CustomAdmin\Controller\Adminhtml\Member;

use Exam\Database\Model\AffiliateMember;
use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\App\ResponseInterface;

class Save extends Action {
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
    public function execute(){
        $data = $this->getRequest()->getPostValue();

        /** @var  Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        if($data) {
            $member = $this->getRequest()->getParam('member');
            if(array_key_exists('entity_id', $member)){
                $id =  $member['entity_id'];
                $model = $this->model->load($id);
            }
            $model = $this->model->setData($data['member']);
        }

        try {
            $model->save();
            $this->messageManager->addSuccessMessage(__('Affiliate Member Saved Successfully'));
            $this->_getSession()->setFormData(false);
            if($this->getRequest()->getParam('back')) {
                return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
            }
            else {
                return $resultRedirect->setPath('*/*/index');
            }
        }
        catch(\Exception $e) {
            $this->messageManager->addErrorMessage($e);
        }

        return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
    }
}