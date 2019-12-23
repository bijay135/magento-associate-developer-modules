<?php

namespace Exam\FirstModule\Controller\Page;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Exam\FirstModule\Api\PencilInterface;
// use Exam\FirstModule\NotMagento\PencilInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Exam\FirstModule\Model\PencilFactory;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\App\Request\Http;
use Exam\FirstModule\Model\HeavyService;

class HelloWorld extends \Magento\Framework\App\Action\Action {
    protected $pencilInterface;
    protected $productRepository;
    protected $pencilFactory;
    protected $productFactory;
    protected $_eventManager;
    protected $http;
    protected $heavyService;
    public function __construct(Context $context, PencilInterface $pencilInterface, ProductRepositoryInterface $productRepository,
                                PencilFactory $pencilFactory, ProductFactory $productFactory, ManagerInterface $_eventManager,
                                Http $http, HeavyService $heavyService) {
        parent::__construct($context);
        $this->pencilInterface = $pencilInterface;
        $this->productRepository = $productRepository;
        $this->pencilFactory = $pencilFactory;
        $this->productFactory = $productFactory;
        $this->_eventManager = $_eventManager;
        $this->http = $http;
        $this->heavyService = $heavyService;
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
        $id = $this->http->getParam('id',0);
        if($id == 1){
            $this->heavyService->printHeavyServiceMessage();
        }
        else{
           echo "Heavy service not used";
        }

        /*
        $message = new \Magento\Framework\DataObject(array("greeting"=>"Good Afternoon"));
        $this->_eventManager->dispatch('custom_event',['greeting'=>$message]);
        echo $message->getGreeting();
        */

        // echo "Main Function"."<br>";

        /*
        $product = $this->productFactory->create()->load(1);
        $product->setName("Iphone 6");
        // $productName = $product->getName();
        $productName = $product->getIdBySku('24-WG02');
        // echo $productName;
        */

        /*
        $pencil = $this->pencilFactory->create(array("name"=>"Bob", "school"=>"International School"));
        var_dump($pencil);
        */

        /*
        echo "Hello World";
        echo $this->pencilInterface->getPencilType();
        echo get_class($this->productRepository);
        */

        /*
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $pencil = $objectManager->create('Exam\FirstModule\Model\Pencil');
        var_dump($pencil);

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $book = $objectManager->create('\Exam\FirstModule\Model\Book');
        var_dump($book);

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $student = $objectManager->create('Exam\FirstModule\Model\Student');
        var_dump($student);
        */
    }
}