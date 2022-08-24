<?php

namespace Zedium\Classes;

use Zedium\Interfaces\IRenderable;

class AdminPage implements IRenderable {

    private $subPageItems;
    private $pageSlug;
    private $groupSlug;
    private $currentPageItems;
    private $currentSectionSlug;
    public function __construct($subpageItems){


        $this->extractCurrentPageFromItems($subpageItems);

        $this->pageSlug = $this->currentPageItems['page_slug'];
        $this->groupSlug = $this->currentPageItems['group_slug'];
        $this->currentSectionSlug = 'my-first-section';
        //add_action('admin_init', array($this, 'registerSections'));
        $this->registerSections();



    }

    public function extractCurrentPageFromItems($subpageItems){
        foreach ($subpageItems['sub_items'] as $item){
            if($item['page_slug'] == $_GET['page']){
                $this->currentPageItems = $item;
                break;
            }
        }
    }

    public function registerSections()
    {

       register_setting($this->groupSlug, 'my_field');
       add_settings_section($this->currentSectionSlug, 'Hello', function(){ echo 'This is section callback'; }, $this->pageSlug);
       add_settings_field('my_field', 'My field', array($this, 'render'), $this->pageSlug, $this->currentSectionSlug);

    }


    public function render()
    {
        echo "<input type='text' name='my_field' id='my_field' value='". get_option('my_field') ."'/>";
    }


}
