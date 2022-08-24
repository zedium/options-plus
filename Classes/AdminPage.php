<?php

namespace Zedium\Classes;

use PHPMailer\PHPMailer\Exception;
use Zedium\Interfaces\IRenderable;

class AdminPage  {

    private $subPageItems;
    private $pageSlug;
    private $groupSlug;
    private $currentPageItems;
    private $currentSectionSlug;

    private $currentPageReferer;
    public function __construct($menu){

        if( strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){

            $params = [];
            $url_components = parse_url($_POST['_wp_http_referer']);
            parse_str($url_components['query'], $params);
            $this->pageSlug = $params['page'];
        }else{
            $this->pageSlug = $_GET['page'];
        }



        $this->currentPageItems = $this->extractCurrentPageFromItems($menu);

        $this->pageSlug = $this->currentPageItems['page_slug'];
        $this->groupSlug = $this->currentPageItems['group_slug'];


        $this->registerSections();



    }

    public function extractCurrentPageFromItems($menu){
        foreach ($menu['sub_menus'] as $item){
            if($item['page_slug'] == $this->pageSlug){
                return $item;

            }
        }
    }

    public function registerSections()
    {
        //

        foreach($this->currentPageItems['sections'] as $section) {
           add_settings_section($section['section_slug'], $section['section_name'], function () use ($section) {
               echo '<h2>' . $section['section_description'] . '</h2>';
           }, $this->pageSlug);

           foreach($section['items'] as $item){
               register_setting(OPTIONS_GROUP_NAME, $item->getName());

               add_settings_field($item->getName(), $item->getLabel(), array($item, 'render'), $this->pageSlug, $section['section_slug']);

           }
       }

    }


    /*public function render()
    {
        echo "<input type='text' name='my_field' id='my_field' value='". get_option('my_field') ."'/>";
    }*/


}
