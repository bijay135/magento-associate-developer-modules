<?php

namespace Exam\Database\Api\Data;

interface AffiliateMemberInterface {
    const NAME = "name";
    const ID = "entity_id";
    const STATUS = "status";
    const ADDRESS = "address";
    const PHONE_NUMBER = "phone_number";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    /**
     * @return int
     */
    public function getId();
    /**
     * @return string
     */
    public function getName();
    /**
     * @return boolean
     */
    public function getStatus();
    /**
     * @return string
     */
    public function getAddress();
    /**
     * @return string
     */
    public function getPhoneNumber();
    /**
     * @return string
     */
    public function getCreatedAt();
    /**
     * @return string
     */
    public function getUpdatedAt();

    /**
     * @parm int $id
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setId($id);

    /**
     * @parm string $name
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setName($name);

    /**
     * @parm boolean #status
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setStatus($status);
    /**
     * @parm string $address
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setAddress($address);
    /**
     * @parm string $phoneNumber
     * @return \Exam\Database\Api\Data\AffiliateMemberInterface
     */
    public function setPhoneNumber($phoneNumber);
}