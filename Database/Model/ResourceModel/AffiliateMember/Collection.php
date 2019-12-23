<?php

namespace Exam\Database\Model\ResourceModel\AffiliateMember;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Exam\Database\Model\AffiliateMember;
use Exam\Database\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;

class Collection extends AbstractCollection {
    protected $_idFieldName = 'entity_id';

    public function _construct() {
        parent::_construct();
        $this->_init(AffiliateMember::class,AffiliateMemberResource::class);
    }
}