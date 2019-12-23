<?php

namespace Exam\FirstModule\Model;

use Exam\FirstModule\Api\PencilInterface;
use Exam\FirstModule\Api\Color;
use Exam\FirstModule\Api\Size;

class Pencil implements PencilInterface {
    protected $color;
    protected $size;
    protected $name;
    protected $school;
    public function __construct(Color $color, Size $size, $name = null, $school = null) {
        $this->color = $color;
        $this->size = $size;
        $this->name = $name;
        $this->school = $school;
    }

    public function getPencilType() {
        return "Pencil has ".$this->color->getColor()." color and ".$this->size->getSize()." size";
    }
}