<?php
/**
 * Plugin Name: Options Plus
 * Plugin URL: http://github.com/zedium/options-plus
 * Version: 0.1
 * Requires PHP: 7.4
 * Author: Ayub Zeitunli
 * Author URI: http://github.com/zedium
 * Text Domain: options-plus
 * 
 */
 namespace Zedium;


 include_once( untrailingslashit(dirname(__FILE__)) . '/vendor/autoload.php');
 include_once( untrailingslashit(dirname(__FILE__)) . '/Items/Items.php');


 use Zedium\Classes\AdminPage;
 use Zedium\Classes\Menu;
 use Zedium\Classes\ArrayToControl;


add_action('init', function(){
    global $items;

    $menu_items = array(
        'title' => 'Options',
        'page_title' => 'Options Plus Theme Options',
        'slug' => 'zedium_options_plus'
    );

    $menuInstance = new Menu($menu_items, new AdminPage($items));

    //new ArrayToControl($menuInstance);

});
 
 

 