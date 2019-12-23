<?php

namespace Exam\Database\Model;

use Magento\Framework\Model\AbstractModel;
use Exam\Database\Model\ResourceModel\AffiliateMember as AffiliateMemberResource;
use Exam\Database\Api\Data\AffiliateMemberInterface;

class AffiliateMember extends AbstractModel implements AffiliateMemberInterface {
    protected function _construct() {
        $this->_init(AffiliateMemberResource::class);
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->getData(AffiliateMemberInterface::ID);
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->getData(AffiliateMemberInterface::NAME);
    }

    /**
     * @return boolean
     */
    public function getStatus() {
        return $this->getData(AffiliateMemberInterface::STATUS);
    }

    /**
     * @return string
     */
    public function getAddress() {
        return $this->getData(AffiliateMemberInterface::ADDRESS);
    }

    /**
     * @return string
     */
    public function getPhoneNumber() {
        return $this->getData(AffiliateMemberInterface::PHONE_NUMBER);
    }

    /**
     * @return string
     */
    public function getCreatedAt() {
        return $this->getData(AffiliateMemberInterface::CREATED_AT);
    }

    /**
     * @return string
     */
    public function getUpdatedAt() {
        return $this->getData(AffiliateMemberInterface::UPDATED_AT);
    }

    /**
     * @parm string $name
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setName($name) {
        $this->setData(AffiliateMemberInterface::NAME, $name);
    }

    /**
     * @parm boolean #status
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status) {
        $this->setData(AffiliateMemberInterface::STATUS, $status);
    }

    /**
     * @parm string $address
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address) {
        $this->setData(AffiliateMemberInterface::ADDRESS, $address);
    }

    /**
     * @parm string $phoneNumber
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setPhoneNumber($phoneNumber) {
        $this->setData(AffiliateMemberInterface::PHONE_NUMBER, $phoneNumber);
    }
}