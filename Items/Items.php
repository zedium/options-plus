<?php

use \Zedium\FormControls\TextControl;

$items = array(
    'section_title'=>'Section Title',
    'section_description'=>'Section Description',
    'items'=>array(
        new TextControl('text', 'site_url', 'site_url', 'Site URL', '', 'Site URL', null),
        new TextControl('text', 'site_title', 'site_title', 'Site Title', '', 'Site Title', true),
    )


);