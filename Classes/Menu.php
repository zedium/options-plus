<?php

namespace Zedium\Classes;

use Zedium\Interfaces\IRenderable;

class Menu{

    private array $menu;
    private $currentPageMenu;
    private AdminPage $adminPage;

    private $groupSlug;
    private $pageSlug;

    public function __construct(array $menu){


        $this->menu = $menu;
        $this->currentPageMenu = $this->extractCurrentPageFromItems($menu);
        $this->groupSlug = $this->currentPageMenu['group_slug'];
        $this->pageSlug = $this->currentPageMenu['page_slug'];

        $this->renderMenuInMainMenus();

    }

    public function extractCurrentPageFromItems($menu){


        foreach ($menu['sub_menus'] as $item){
            if($item['page_slug'] == $_GET['page']){
                return $item;

            }
        }
    }


    public function renderMenuInMainMenus(){


        add_menu_page(
            $this->menu['main_menu']['page_title'],
            $this->menu['main_menu']['menu_title'],
            'manage_options',
            $this->menu['main_menu']['page_slug'], null,
            //array($this, 'renderMenuPageCallback'),
            $this->menu['main_menu']['menu_icon']

        );
        foreach($this->menu['sub_menus'] as $item){

            add_submenu_page($item['parent_page_slug'], $item['page_title'], $item['menu_title'], 'manage_options', $item['page_slug'], array($this, 'renderMenuPageCallback'));
        }

    }

    public function renderMenuPageCallback(){

//        if(empty($this->groupSlug))
//            return;
        settings_errors();

        echo "<form action='options.php' method='post'>";

        settings_fields(OPTIONS_GROUP_NAME);

        do_settings_sections($this->pageSlug);

        submit_button('Submit');

        echo "</form>";
    }


}
