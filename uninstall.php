<?php
       //Silence is golden
 defined('ABSPATH') || die('Nice Try');
 delete_option('updateTitle');
 global $wpdb;
 $prefix = $wpdb->prefix;
 $sql = "DROP TABLE IF EXISTS `{$prefix}likedislike`;";
 $wpdb->query($sql);
      







