<?php

namespace Exam\Database\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface AffiliateMemberRepositoryInterface {
    /**
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface[]
     */
    public function getList();

    /**
     * @param int $id
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function getAffiliateMemberById($id);

    /**
     * @param int $id
     * @return void
     */
    public function deleteByID($id);

    /**
     * @param \Exam\Database\Api\Data\AffiliateMemberInterface $member
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function saveAffiliateMember(\Exam\Database\Api\Data\AffiliateMemberInterface $member);

    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Exam\Database\Api\Data\AffiliateMemberSearchResultInterface
     */
    public function getSearchResultsList(SearchCriteriaInterface $searchCriteria);
}