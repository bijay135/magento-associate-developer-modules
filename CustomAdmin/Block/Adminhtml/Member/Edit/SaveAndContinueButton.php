<?php


namespace Exam\CustomAdmin\Block\Adminhtml\Member\Edit;


use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton implements ButtonProviderInterface {
    public function getButtonData() {
        return $data = [
            'label' => __('Save And Continue'),
            'class' => 'save',
            'sort_order' => 40
        ];
    }
}