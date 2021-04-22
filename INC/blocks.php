<?php
//defined('ABSPATH') || die('Nice Try');
   class AZ_blocks{
      	public function __construct(){
            add_action('init', array($this, 'AZ_custom_block_01'));
      	}
      	public function AZ_custom_block_01(){
      		wp_register_script('AZ_blocks_script', PLUGIN_URL. "assets/JS/block.js", array('wp-blocks', 'wp-element'));
      		$name =  "AZ-plugin/AZ-block01";
      		$args = array('editor_script' => 'AZ_blocks_script');
      		register_block_type($name, $args);
      	}
      }
       new AZ_blocks;



