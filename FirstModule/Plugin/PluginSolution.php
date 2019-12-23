<?php

namespace Exam\FirstModule\Plugin;

class PluginSolution {
    public function beforeExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject){
        echo "before execute sort order 10"."<br>";
    }

    public function afterExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject, $result){
        echo "after execute sort order 10"."<br>";
    }

    public function aroundExecute(\Exam\FirstModule\Controller\Page\HelloWorld $subject, callable $proceed){
        echo "before proceed sort order 10"."<br>";
        $proceed();
        echo "after proceed sort order 10"."<br>";
    }

    /*
    public function beforeSetName (\Magento\Catalog\Model\Product $subject, $name){
        return "Before Plugin ".$name;
    }

    public function afterGetName (\Magento\Catalog\Model\Product $subject, $result){
         return $result." After Plugin";
    }

    public function aroundGetName(\Magento\Catalog\Model\Product $subject, callable $proceed){
        echo "before proceed"."<br>";
        $name = $proceed();
        echo $name."<br>";
        echo "after proceed"."<br>";
        return $name;
    }

    public function aroundGetIdBySku(\Magento\Catalog\Model\Product $subject, callable $proceed, $sku){
        echo "before proceed"."<br>";
        $id = $proceed($sku);
        echo $id."<br>";
        echo "after proceed"."<br>";
        return $id;
    }
    */
}