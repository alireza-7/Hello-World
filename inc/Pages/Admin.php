<?php

namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

    public $settings;
    public $pages;
    public $subPages;
    public $callbacks;

    public function register() {
        $this->settings = new SettingsApi();
        $this->callbacks=new AdminCallbacks();
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
                'option_group' => 'Hello_Option_Group',
                'option_name' => 'text_example',
                'callback' => [$this->callbacks , 'helloOptionsGroup'],
            ],
        ];
        $this->settings->setSettings($args);
    }
    
    public function setSections() {
        $args=[
            [
                'id' => 'Hello_admin_index',
                'title' => 'settings',
                'callback' => [$this->callbacks , 'helloAdminSection'],
                'page'=> 'Hello',
                
            ],
        ];
        $this->settings->setSections($args);
    }
    
    public function setFields() {
        $args=[
            [
                'id' => 'text_example',
                'title' => 'Text Example',
                'callback' => [$this->callbacks , 'helloTextExample'],
                'page'=> 'Hello',
                'section' => 'Hello_admin_index',
                'args'=> [
                    'label_for' => 'text_example',
                    'class' => 'example-class',
                ]
                
            ],
        ];
        $this->settings->setFields($args);
    }

}
