<?php


namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\Size;

class Normal implements Size {
    public function getSize() {
        return "Medium";
    }
}