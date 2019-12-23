<?php

namespace Exam\FirstModule\NotMagento;

class RedPencil implements PencilInterface {
    public function getPencilType() {
        return "Red Pencil";
    }
}