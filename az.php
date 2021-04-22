<?php
/**
 * Plugin Name:       AZ plugin
 * Plugin URI:        https://portfoliosite.xyz
 * Description:       This plugin is made for testing purpose.
 * Version:           1.0.0
 * Author:            Muhammad Azhar
 * Author URI:        https://portfoliosite.xyz
 * License:           GPL v2 or later
 * Text Domain:       my_Az_plugin
 */
 
 defined('ABSPATH') || die('Nice Try');
 define('plugin_path', plugin_dir_path(__FILE__));
 define('PLUGIN_URL', 	plugin_dir_url(__FILE__));
 define('PLUGIN_FILE',__FILE__);

 include plugin_path."INC/metaboxes.php";
 include plugin_path."INC/custom-post.php";
 include plugin_path."INC/ajax.php";
 include plugin_path."INC/db.php";
 include plugin_path."INC/blocks.php";

  register_activation_hook(__FILE__, 'AZ_plugin_activation');
  register_deactivation_hook(__FILE__, 'AZ_plugin_deactivation');
  register_uninstall_hook(__FILE__, 'AZ_plugin_uninstall');

  function AZ_plugin_activation(){
  	add_option('updateTitle', 'Your title is changed');
  }
  function AZ_plugin_deactivation(){
  	
  }
 // function AZ_plugin_uninstall(){}
 
  /*add_filter('the_title', 'AZ_the_title');
  function AZ_the_title(){
  	return "Your titles are changed";
  }*/
  add_action('wp_enqueue_scripts', 'AZ_enqueue_scripts');
  function Az_enqueue_scripts(){
    wp_enqueue_script('jquery');
  	wp_enqueue_style('az plugin', plugin_dir_url(__FILE__). "assets/css/style.css");
  	wp_enqueue_script('az plugin',plugin_dir_url(__FILE__). "assets/js/custom.js", array(),'1.0.0', false);
    //wp_localize_script('az plugin', 'ajax-object', array('ajaxurl', admin_url('admin-ajax.php','num1'=>10)));
  }
 add_action('admin_enqueue_scripts','AZ_admin_enqueue_scripts');
  function AZ_admin_enqueue_scripts(){
    wp_enqueue_script('AZ_enqueue_scripts', PLUGIN_DIR_URL(__FILE__). "assets/js/custom.js", array(),'1.0.0', false);
    
  }
  add_action('admin_menu', 'AZ_admin_menu');
  add_action('admin_menu', 'AZ_process_form_settings');
  function AZ_admin_menu(){
  	add_menu_page('AZ Options', 'AZ Options', 'manage_options', 'AZ-Options','AZ_Options_func', $icon_url = '', $position = null);
  	add_submenu_page('AZ-Options', 'AZ Settings', 'AZ Settings','manage_options', 'AZ-Settings', 'AZ_Settings_func');
  	add_submenu_page('AZ-Options', 'AZ Layout', 'AZ Layout','manage_options', 'AZ-Layout', 'AZ_layout_func');
  }
  register_activation_hook(__FILE__, function(){
      add_option('AZ_option_1', '');
  });
  register_deactivation_hook(__FILE__, function(){
    delete_option('AZ_option_1');
  });
  function AZ_Options_func(){ ?>
  	<div class="wrap">
  		 <h1>AZ Options Menu</h1>
  		 <?php settings_errors(); ?>
  		<form id="ajax_form" action="options.php" method="post">
  			<?php settings_fields('AZ_option_group'); ?>
  		<label for="">Settings One: <input type="Text" name="AZ_option_1" value="<?php echo esc_html(get_option('AZ_option_1')); ?>"></label>
  		<?php submit_button('Save changes') ?>
  		</form>
  	</div> 
  	<?php
  }
  function AZ_Settings_func(){
  	echo "<h1>AZ Settings Menu</h1>";
  }
  function AZ_layout_func(){
  	echo "<h1>AZ Layout Menu</h1>";
  }
  function AZ_process_form_settings(){
  	register_setting('AZ_option_group', 'AZ_option_name');
  	if (isset($_POST['action']) && current_user_can('manage_options')) {
  		update_option('AZ_option_1', sanitize_text_field($_POST['AZ_option_1']));
  	}
  }
 
