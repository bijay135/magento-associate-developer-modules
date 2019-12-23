<?php


namespace Exam\RequestFlow\Controller\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Raw;
use Magento\Framework\Controller\Result\ForwardFactory;
use Magento\Framework\Controller\Result\RedirectFactory;

class ResponseType extends Action {
    protected $pageFactory;
    protected $jsonFactory;
    protected $raw;
    protected $forwardFactory;
    protected $redirectFactory;
    public function __construct(Context $context, PageFactory $pageFactory, JsonFactory $jsonFactory,
                                Raw $raw, ForwardFactory $forwardFactory, RedirectFactory $redirectFactory) {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->jsonFactory = $jsonFactory;
        $this->raw = $raw;
        $this->forwardFactory = $forwardFactory;
        $this->redirectFactory = $redirectFactory;
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
        // return $this->pageFactory->create();
        // return $this->jsonFactory->create()->setData(['key'=>'value','key2'=> ['one','two']]);
        // return $this->raw->setContents('Hello World');
        /*
        $result = $this->forwardFactory->create();
        $result->setModule('noroutefound')->setController('page')->forward('customnoroute');
        return $result;
        */
        $result = $this->redirectFactory->create();
        $result->setPath('norroutefound/page/customnoroute');
        return $result;
    }
}