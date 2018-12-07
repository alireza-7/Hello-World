<?php

namespace Inc\Api\Callbacks;

class AdminCallbacks extends \Inc\Base\BaseController{
    
    public function adminDashboard(){
        return require_once ($this->plugin_path. '/templates/admin.php');
    }
    public function checkBoxSanitize($input) {
        //return filter_var($input , FILTER_SANITIZE_NUMBER_INT);
        return (isset($input) ? true : false);
    }

    public function helloAdminSection() {
        echo 'check the beatufull section';
    }
    public function helloTextExample() {
        $value= esc_attr(get_option('text_example'));
        echo '<input type="text" name="text_example" class="regular_text" value="'.$value.'" placeholder="write Somthing Here!"';
    }
}
