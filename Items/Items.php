<?php

use \Zedium\FormControls\TextControl;
use \Zedium\FormControls\CheckBoxControl;

const OPTIONS_GROUP_NAME = 'zedium-group';

$items = array(

    'main_menu' => array(
        'page_title' => 'Theme Options',
        'menu_title' => 'Options',
        'page_slug' => 'option-plus-general-options',
        'menu_icon' => 'dashicons-admin-generic',
    ),
    'sub_menus' => array(
        array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Options',
            'page_slug' => 'option-plus-general-options',
            'parent_page_slug' => 'option-plus-general-options',
            'menu_icon' => 'dashicons-admin-generic',
            'group_slug'=>'zedium-group',
            'sections' => array(
                                    array(
                                        'section_title' => 'General Title',
                                        'section_description' => 'General Description',
                                        'section_slug'=> 'section-general-options-site-options',

                                        'items' => array(
                                            new TextControl('text', 'site_url', 'site_url', 'Site URL', '', 'Site URL', null, 'option-plus-general-options'),
                                            new TextControl('text', 'site_title', 'site_title', 'Site Title', '', 'Site Title', null, 'option-plus-general-options'),
                                        )),
                                    array(
                                        'section_title' => 'Site availability',
                                        'section_description' => 'Availability Description',
                                        'section_slug'=> 'section-general-options-site-availability',

                                        'items' => array(
                                            new TextControl('text', 'site_availibility', 'site_availibility', 'Site URL', '', 'Site URL', null, 'option-plus-account-options'),
                                            new TextControl('text', 'site_is_down', 'site_is_down', 'Site is down', '', 'Site Title', null, 'option-plus-account-options'),
                                        )
                                    ),
                                ),



        ),

        array(
            'page_title' => 'Custom CSS',
            'menu_title' => 'Custom Css',
            'page_slug' => 'option-plus-custom-css',
            'parent_page_slug' => 'option-plus-general-options',
            'menu_icon' => 'dashicons-admin-generic',
            'group_slug'=>'general-group',
            'sections' => array(
                array(
                    'section_title' => 'Header Style',
                    'section_description' => 'Header Style Description',
                    'section_slug'=> 'section-header-style',
                    'page_slug'=>'option-plus-custom-css',
                    'items' => array(
                        new TextControl('text', 'header_css', 'header_css', 'Header Css', '', 'Header CSS', null, 'section-header-style'),
                        new TextControl('text', 'footer_css', 'footer_css', 'footer css', '', 'Footer CSS', null, 'section-header-style'),
                    )),
                array(
                    'section_title' => 'Show Logo',
                    'section_description' => 'Show logo on header',
                    'section_slug'=> 'section-show-logo',
                    'page_slug'=>'option-plus-custom-css',
                    'items' => array(
                        new CheckBoxControl('checkbox', 'show_logo', 'show_logo', 'Show Logo', '', 'Show logo', null, 'section-show-logo'),
                        //new TextControl('text', 'site_is_down', 'site_availibility', 'Site Title', '', 'Site Title', true, 'option-plus-account-options'),
                    )
                ),
            ),



        )
    )
);