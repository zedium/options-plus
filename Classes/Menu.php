<?php

namespace Zedium\Classes;

use Zedium\Interfaces\IRenderable;

class Menu{

    private array $items;
    private $currentPageItems;
    private AdminPage $adminPage;

    private $groupSlug;
    private $pageSlug;

    public function __construct(array $items){

        $this->items = $items;
        $this->extractCurrentPageFromItems();
        $this->groupSlug = $this->currentPageItems['group_slug'];
        $this->pageSlug = $this->currentPageItems['page_slug'];

        $this->initMenu();

    }

    public function extractCurrentPageFromItems(){
        foreach ($this->items['sub_items'] as $item){
            if($item['page_slug'] == $_GET['page']){
                $this->currentPageItems = $item;
                break;
            }
        }
    }

    public function getItems(){

        return  $this->items;

    }

    public function initMenu(){


        add_menu_page(
            $this->items['main_item']['page_title'],
            $this->items['main_item']['menu_title'],
            'manage_options',
            $this->items['main_item']['page_slug'],
            array($this, 'renderMenuPageCallback'),
            $this->items['main_item']['menu_icon']

        );
        foreach($this->items['sub_items'] as $item){

            add_submenu_page($item['parent_page_slug'], $item['page_title'], $item['menu_title'], 'manage_options', $item['page_slug'], array($this, 'renderMenuPageCallback'));
        }

    }

    public function renderMenuPageCallback(){


        settings_errors();

        echo "<form action='options.php' method='post'>";

        settings_fields($this->groupSlug);

        do_settings_sections($this->pageSlug);


        submit_button('Submit');

        echo "</form>";
    }


}
