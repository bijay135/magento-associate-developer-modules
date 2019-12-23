<?php

namespace Exam\FirstModule\NotMagento;

class BigPencil implements PencilInterface {
    public function getPencilType() {
        return "Big Pencil";
    }
}