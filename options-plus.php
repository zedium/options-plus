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

/*
 add_action('admin_menu', function(){

     add_menu_page('My Title', 'Options', 'manage_options', 'zedium-menu-slug',function() {
         settings_errors();
         echo "<form action='options.php' method='post'>";
         settings_fields('zedium-group1');

         do_settings_sections('zedium-menu-slug');
         submit_button('Submit');
         echo '</form>';
     });


 });


 add_action('admin_init', function(){
     register_setting('zedium-group', 'my_field');
     add_settings_section('my-section', 'Section Title', function(){echo 'hi';}, 'zedium-menu-slug' );
     add_settings_field('my_field', 'Title', function(){
         echo "<input type='text' name='my_field' id='my_field' />";
     }, 'zedium-menu-slug', 'my-section');
 });*/



    global $items;


    add_action('admin_menu', function() use ($items){
        new Menu($items);
    });

    add_action('admin_init', function() use($items){
        $adminPage = new AdminPage($items);
    });


    //new ArrayToControl($menuInstance);


 
 

 