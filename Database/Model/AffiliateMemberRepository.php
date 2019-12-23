<?php

namespace Exam\Database\Model;

use Exam\Database\Api\AffiliateMemberRepositoryInterface;
use Exam\Database\Model\ResourceModel\AffiliateMember\CollectionFactory;
use Exam\Database\Model\AffiliateMemberFactory;
use Exam\Database\Model\ResourceModel\AffiliateMember;
use Magento\Framework\Api\SearchCriteriaInterface;
use \Exam\Database\Api\Data\AffiliateMemberSearchResultInterfaceFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor;

class AffiliateMemberRepository implements AffiliateMemberRepositoryInterface {
    private $collectionFactory;
    private $affiliateMemberFactory;
    private $affiliateMember;
    private $resultInterfaceFactory;
    private $collectionProcessor;

    public function __construct(CollectionFactory $collectionFactory, AffiliateMemberFactory $affiliateMemberFactory,
                                AffiliateMember $affiliateMember, CollectionProcessor $collectionProcessor,
                                AffiliateMemberSearchResultInterfaceFactory $resultInterfaceFactory) {
        $this->collectionFactory = $collectionFactory;
        $this->affiliateMemberFactory = $affiliateMemberFactory;
        $this->affiliateMember = $affiliateMember;
        $this->collectionProcessor = $collectionProcessor;
        $this->resultInterfaceFactory = $resultInterfaceFactory;
    }

    /**
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface[]
     */
    public function getList() {
        return $this->collectionFactory->create()->getItems();
    }

    /**
     * @param int $id
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemberById($id) {
        $member = $this->affiliateMemberFactory->create();
        return $member->load($id);
    }

    /**
     * @param \Exam\Database\Api\Data\AffiliateMemberInterface $member
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function saveAffiliateMember(\Exam\Database\Api\Data\AffiliateMemberInterface $member) {
        if($member->getId() == null){
            $this->affiliateMember->save($member);
            return $member;
        }
        else {
            $newMember = $this->affiliateMemberFactory->create()->load($member->getId());
            foreach($member->getData() as $key => $value){
                $newMember->setData($key, $value);
            }
            $this->affiliateMember->save($newMember);
            return $newMember;
        }
    }

    /**
     * @param int $id
     * @return void
     * @throws \Exception
     */
    public function deleteByID($id) {
        $member = $this->affiliateMemberFactory->create()->load($id);
        $member->delete();
    }

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Exam\Database\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria) {
        $collection = $this->affiliateMemberFactory->create()->getCollection();
        $this->collectionProcessor->process($searchCriteria, $collection);
        $searchResults = $this->resultInterfaceFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getData());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }
}