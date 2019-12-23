<?php

namespace Exam\HelloWorld\ViewModel;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class HelloView implements ArgumentInterface {
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function getHelloWorld() {
        return "This is from custom Block";
    }

    public function helloArray(){
        $array = [
            "good",
            "very good",
            "excellent"
        ];

        return $array;
    }

    public function getProductName() {
        $product = $this->productRepository->get('24-MB01');
        return $product->getName();
    }
}