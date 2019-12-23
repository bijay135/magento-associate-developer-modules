<?php


namespace Exam\FirstModule\Model;
use Exam\FirstModule\Api\Color;
use Exam\FirstModule\Api\Size;

class Book {
    protected $color;
    protected $size;
    public function __construct(Color $color, Size $size) {
        $this->color = $color;
        $this->size = $size;
    }
}