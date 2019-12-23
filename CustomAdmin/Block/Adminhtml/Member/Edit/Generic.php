<?php


namespace Exam\CustomAdmin\Block\Adminhtml\Member\Edit;


use Exam\Database\Model\AffiliateMember;
use Magento\Framework\Registry;

class Generic {
    protected $urlBuilder;
    protected $registry;

    public function __construct(\Magento\Backend\Block\Widget\Context $context, Registry $registry) {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    public function getId() {
        /** @var AffiliateMember $member */
        $member = $this->registry->registry('member');
        return $member ? $member->getID() : null;
    }

    public function getUrl($route='', $parm=[]){
        return $this->urlBuilder->getUrl($route, $parm);
    }
}