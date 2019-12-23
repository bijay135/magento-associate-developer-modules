<?php


namespace Exam\CustomAdmin\Controller\Adminhtml\Member;
use Exam\Database\Model\AffiliateMember;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Registry;

class Edit extends Action {
    protected $pageFactory;
    protected $affiliateMember;
    protected $registry;
    public function __construct(PageFactory $pageFactory, AffiliateMember $affiliateMember, Registry $registry,
                                Action\Context $context) {
        $this->pageFactory = $pageFactory;
        $this->affiliateMember = $affiliateMember;
        $this->registry = $registry;
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
        $id = $this->getRequest()->getParam("id");
        $model = $this->affiliateMember;
        if($id) {
            $model->load($id);
            if(!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This member does not exist'));
                $result = $this->resultRedirectFactory->create();
                return $result->setPath('affiliate/member/index');
            }
        }

        $data = $this->_getSession()->getFormData(true);
        if(!empty($data)){
            $model->setData($data);
        }

        $this->registry->register("member", $model);

        /** @var Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->pageFactory->create();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Member') : __('Add a New Member'),
            $id ? __('Edit Member') : __('Add a New Member')
        );

        if($id){
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        }
        else {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }

        return $resultPage;
    }
}