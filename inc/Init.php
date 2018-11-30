<?php
namespace Inc;

final class Init{

    public static function get_services(){
        return [
            Pages\Admin::class,
            Base\Enqueue::class,
            Base\SettingsLinks::class,
        ];
    }
    public static function register_services(){
        foreach(self::get_services() as $class){
            $service=self::instantiate($class);
            if(method_exists($service , 'register')){
                $service->register();
            }
        }
    }
    private static function instantiate($class){
        return new $class();
    }
}



// use Inc\Activate;
// class Hello{
//     function __construct(){
//         
//         //echo $this->Pluginss;exit;
//         add_action('init', array($this ,'custom_post_type'));
//     }
//     public function custom_post_type(){
//         register_post_type('books', ['public'=>true,'label'=>'books']);
//     }

//     
// }

// ?>