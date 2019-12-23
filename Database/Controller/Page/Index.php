<?php

namespace Exam\Database\Controller\Page;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Exam\Database\Model\AffiliateMemberFactory;

class Index extends Action{
    protected $affiliateMemberFactory;
    public function __construct(Context $context, AffiliateMemberFactory $affiliateMemberFactory) {
        parent::__construct($context);
        $this->affiliateMemberFactory = $affiliateMemberFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     * @throws \Exception
     */
    public function execute() {
        $affiliateMember = $this->affiliateMemberFactory->create();
        $collection = $affiliateMember->getCollection()
            ->addFieldToSelect(['name','status'])
            // ->addFieldToFilter('name',array('eq'=>'Bob'))
            ->addFieldToFilter('status',array('neq'=>true));
        foreach ($collection as $item){
                print_r($item->getData());
                echo "<br>";
        }

        /*
        $member = $affiliateMember->load('4');
        $member->delete();
        */

        /*
        $member = $affiliateMember->load('1');
        $member->setAddress('new address');
        $member->save();
        // var_dump($member->getData());
        /*

        /*
        $affiliateMember->addData(['name'=>'Rand','address'=>'a new address','status'=>true,'phone_number'=>'9453158921']);
        $affiliateMember->save();
        */
    }
}