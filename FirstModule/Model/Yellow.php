<?php

namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\Color;
use Exam\FirstModule\Api\Brightness;

class Yellow implements Color {
    protected $brightness;
    public function __construct(Brightness $brightness) {
        $this->brightness = $brightness;
    }

    public function getColor() {
        return "Yellow";
    }
}