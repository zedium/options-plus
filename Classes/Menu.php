<?php

namespace Zedium\Classes;

use Zedium\Interfaces\IRenderable;

class Menu{

    private array $items;
    private AdminPage $adminPage;
    
    public function __construct(array $items, IRenderable $adminPage){

        $this->items = $items;
        $this->adminPage = $adminPage;
        add_action('admin_menu', array($this, 'initMenu'));

    }

    public function getItems(){

        return  $this->items;

    }

    public function initMenu(){

        add_menu_page(
            $this->items['page_title'],
            $this->items['title'],
            'manage_options',
            $this->items['slug'],
            array($this, 'renderMenuCallback'),
            'dashicons-admin-generic'

        );

    }

    public function renderMenuCallback(){
        $this->adminPage->render();
    }
}
