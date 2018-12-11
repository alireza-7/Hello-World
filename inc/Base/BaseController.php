<?php

namespace Inc\Base;

class BaseController{
    public $plugin_path;
    public $plugin_url;
    public $plugin;
    public $managers=array();

    public function __construct(){
        $this->plugin_path= plugin_dir_path(dirname(__FILE__ , 2 ));
        $this->plugin_url= plugin_dir_url(dirname(__FILE__ , 2 ));
        $this->plugin='hello-world/hello-world.php';
        
        $this->managers=[
            'cpt_manager'=> 'Activate cpt_manager',
            'taxonomy_manager' =>'Activate taxonomy_manager',
            'media_widget'=>'Activate media_widget',
            'gallery_manager'=>'Activate gallery_manager',
            'testomonial_manager'=>'Activate testomonial_manager',
            'templates_manager'=>'Activate templates_manager',
            'login_manager'=>'Activate login_manager',
            'membership_manager'=>'Activate membership_manager',
            'chat_manager'=>'Activate chat_manager',
        ];
    }
}