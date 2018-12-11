<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\Callbacks\ManagerCallbacks;

class Admin extends BaseController {

    public $settings;
    public $pages;
    public $subPages;
    public $callbacks;
    public $callbacks_mngr;

    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks=new AdminCallbacks();
        $this->callbacks_mngr=new ManagerCallbacks();
        $this->setPages();
        $this->setSubPages();
        $this->setSettings();
        $this->setSections();
        $this->setFields();
        $this->settings->addPages($this->pages)->addSubPages($this->subPages)->register();
    }

    public function setPages() {
        $this->pages = [
                [
                'page_title' => 'Hello plugin',
                'menu_title' => 'Hello',
                'capability' => 'manage_options',
                'menu_slug' => 'Hello',
                'callback' => [$this->callbacks , 'adminDashboard'],
                'icon_url' => 'dashicons-store',
                'position' => 110,
            ],
                [
                'page_title' => 'Test plugin',
                'menu_title' => 'Test',
                'capability' => 'manage_options',
                'menu_slug' => 'Test',
                'callback' => function () {
                    echo '<h1>Test Plugin</h1>';
                },
                'icon_url' => 'dashicons-external',
                'position' => 9,
            ]
        ];
    }
    public function setSubPages() {
         $this->subPages = [
                [
                'parent_slug' => 'Hello',
                'page_title' => 'Custom Post Type',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'hello_cpt',
                'callback' => function () {
                    echo '<h1>Custom Post Type Manager</h1>';
                },
            ],
                [
                'parent_slug' => 'Hello',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'hello_Widgets',
                'callback' => function () {
                    echo '<h1>Custom Widgets Manager</h1>';
                },
            ]
        ];
    }
    public function setSettings() {
        $args=array();
        foreach ($this->managers as $key => $value){
            $args[]=[
                'option_group' => 'Hello_plugin_settings',
                'option_name' => $key,
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ];
        }
        
        
        $this->settings->setSettings($args);
    }
    
    public function setSections() {
        $args=[
            [
                'id' => 'Hello_admin_index',
                'title' => 'settings Managaer',
                'callback' => [$this->callbacks_mngr , 'adminSectionManager'],
                'page'=> 'Hello',
                
            ],
        ];
        $this->settings->setSections($args);
    }
    
    public function setFields() {
        
        $args=array();
        foreach ($this->managers as $key => $value){
            $args[]=[
                'id' => $key,
                'title' => $value,
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => $key,
                    'class' => 'ui-toggle',
                ]
            ];
        }
        
        $this->settings->setFields($args);
    }

}
