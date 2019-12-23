<?php

namespace Exam\FirstModule\Plugin;

class PluginSolution2 {
    public function beforeExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject){
        echo "before execute sort order 20"."<br>";
    }

    public function afterExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject, $result){
        echo "after execute sort order 20"."<br>";
    }

    public function aroundExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject, callable $proceed){
        echo "before proceed sort order 20"."<br>";
        $proceed();
        echo "after proceed sort order 20"."<br>";
    }
}