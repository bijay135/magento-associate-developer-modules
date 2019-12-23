<?php


namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\Color;

class Green implements Color {
    public function getColor() {
        return "Green";
    }
}