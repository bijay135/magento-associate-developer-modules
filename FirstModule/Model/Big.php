<?php


namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\Size;

class Big implements Size {
    public function getSize() {
        return "Big";
    }
}