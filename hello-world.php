<?php

/*
Plugin Name: Hello World
Author: Alireza Okati
Author URI:http://yii-persian.ir
Description: the plugin send to hello
Plugin URI:http://yii-persian.ir
version:1.0.0
*/

if(!defined('ABSPATH')) die;

function activate_hello_world(){
    Inc\Base\Activate::activate();
}
register_activation_hook(__FILE__, activate_hello_world);

function deactivate_hello_world(){
    Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__ , deactivate_hello_world );

if(file_exists( plugin_dir_path(__FILE__).'/vendor/autoload.php')){
    require_once plugin_dir_path(__FILE__).'/vendor/autoload.php';
}

if(class_exists('Inc\Init')){
    Inc\Init::register_services();
}
