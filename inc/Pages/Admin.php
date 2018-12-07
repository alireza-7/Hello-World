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
        $args=[
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'cpt_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'taxonomy_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'media_widget',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'gallery_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'testomonial_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'templates_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'login_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'membership_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
            [
                'option_group' => 'Hello_plugin_settings',
                'option_name' => 'chat_manager',
                'callback' => [$this->callbacks , 'checkBoxSanitize'],
            ],
        ];
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
        $args=[
            [
                'id' => 'cpt_manager',
                'title' => 'Activate cpt Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'cpt_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'taxonomy_manager',
                'title' => 'Activate taxonomy Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'taxonomy_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'media_widget',
                'title' => 'Activate media widget',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'media_widget',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'gallery_manager',
                'title' => 'Activate gallery Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'gallery_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'testomonial_manager',
                'title' => 'Activate testomonial Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'testomonial_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'templates_manager',
                'title' => 'Activate templates Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'templates_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'login_manager',
                'title' => 'Activate login Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'login_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'membership_manager',
                'title' => 'Activate membership Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'membership_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            [
                'id' => 'chat_manager',
                'title' => 'Activate chat Manager',
                'callback' => [$this->callbacks_mngr , 'checkBoxField'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'chat_manager',
                    'class' => 'ui-toggle',
                ]
                
            ],
            
        ];
        $this->settings->setFields($args);
    }

}
