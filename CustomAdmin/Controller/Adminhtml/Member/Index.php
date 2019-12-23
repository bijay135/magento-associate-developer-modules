<?php

namespace Exam\CustomAdmin\Controller\Adminhtml\Member;
use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action{
    private $pageFactory;

    public function __construct(Action\Context $context, PageFactory $pageFactory) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
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
        return $this->pageFactory->create();
    }
}