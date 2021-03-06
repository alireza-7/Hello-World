<?php

namespace Inc\Api\Callbacks;

class ManagerCallbacks extends \Inc\Base\BaseController{
    
    public function checkBoxSanitize($input) {
        //return filter_var($input , FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }

    public function adminSectionManager(){
        echo 'Test Section Manager';
    }

    public function checkBoxField($args){
        $name=$args['label_for'];
        $classes=$args['class'];
        $checkBox= get_option($name);
        echo '<div class="'.$classes.'"><input type="checkBox" id="'.$name.'" name="'.$name.'" value="1" class="'.$classes.'" '.($checkBox ? 'checked' : '').'/>'
                . '<label for="'.$name.'"><div></div></label></div>' ;
    }

}
