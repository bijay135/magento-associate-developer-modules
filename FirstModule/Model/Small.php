<?php


namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\Size;

class Small implements Size {
    public function getSize() {
        return "Small";
    }
}