<?php

namespace Zedium\Classes;

use Zedium\Interfaces\IRenderable;

class AdminPage implements IRenderable {

    private array $optionControls;

    public function __construct(array $controls){

        $this->optionControls = $controls;
    }



    public function render()
    {

        $wrapperClassName = 'wrap';
        $afterContentDiv = '</div>';

        $filteredWrapperClassName = apply_filters('zedium_options_plus_wrapper_class_name',$wrapperClassName ,null);
        $filteredBeforeContentDiv = '<div class="' . $filteredWrapperClassName . '">';
        $filteredBeforeContentDiv = apply_filters('zedium_options_plus_before_content_dive', $filteredBeforeContentDiv, null);
        $filteredAfterContentDiv = apply_filters('zedium_options_plus_before_content_dive', $afterContentDiv, null);



        echo $filteredBeforeContentDiv;
        $this->convertToHtmlControl();
        echo $filteredAfterContentDiv;

    }

    public function convertToHtmlControl(){
        foreach ($this->optionControls['items'] as $item) {
            echo $item->render();
        }

    }


}