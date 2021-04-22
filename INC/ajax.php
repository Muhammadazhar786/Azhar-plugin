<?php
defined('ABSPATH') || die('Nice Try');
     add_action('wp_ajax_my_ajax_action', 'AZ_ajax_action');
     function AZ_ajax_action(){
     	if (isset($_post['action']) && isset($_post['option1'])) {
     		 update_option('AZ_option_1', sanitize_fields($_post['option1']));
     		 echo "Field updated successfully";
     	}else{
     		echo "Error updating field";
     	}
     	wp_die();
     }
