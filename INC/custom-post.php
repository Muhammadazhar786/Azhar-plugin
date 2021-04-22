<?php
defined('ABSPATH') || die('Nice Try');
add_action('init', 'AZ_news_post');
function AZ_news_post(){
	register_post_type('news', array(
     'label' =>'Globle News', 
     'labels' => array(
     'name'         => _x( 'Global News', 'News post type general name'  ),
     'singular_name'            => _x( 'News', 'post type singular name'  ),
     'add_new'                  => _x( 'Add New News', 'News post'  ),
     'add_new_item'             => __( 'Add New News'  ),
     'edit_item'                => __( 'Edit News'  ),
     'new_item'                 => __( 'New News'  ),
     'view_item'                => __( 'View News'  ),
     'view_items'               => __( 'View News' ),
     'search_items'             => __( 'Search News' ),
     'not_found'                => __( 'No News found.'  ),
     'not_found_in_trash'       => __( 'No News found in Trash.' ),
     'parent_item_colon'        => null,
     'all_items'                => __( 'All News' ),
     'archives'                 => __( 'News Archives'  ),
     'attributes'               => __( 'News Attributes'  ),
     'insert_into_item'         => __( 'Insert into News'  ),
     'uploaded_to_this_item'    => __( 'Uploaded to this News'  ),
     'featured_image'           => _x( 'Featured image', 'News'  ),
     'set_featured_image'       => _x( 'News featured image','News' ),
     'remove_featured_image'    =>_x( 'Remove featured image', 'News' ),
     'use_featured_image'       => _x( 'News featured image', 'News'),
     'filter_items_list'        => __( 'Filter News list'  ),
     'filter_by_date'           => __( 'Filter by date'  ),
     'items_list_navigation'    => __( 'News list navigation'  ),
     'items_list'               => __( 'News list' ),
     'item_published'           => __( 'News published.'  ),
     'item_published_privately' => __( 'News published privately.'  ),
     'item_reverted_to_draft'   => __( 'News reverted to draft.'  ),
     'item_scheduled'           => __( 'News scheduled.'  ),
     'item_updated'             => __( 'News updated.'  ),
    ),
     'public' => true,
     'description' => 'Test custom post for news',
     'supports' => ['title','editor','comments','custom_fields','thumbnail'],
 ));
      register_taxonomy('news-categories', ['news'], array(
       'labels' => array(
        'name'  => _x( ' News Categories', 'taxonomy general name'),
        'singular_name' =>_x('News Category', 'taxonomy singular name' ),
        'search_items'              =>__('Search News Categories' ),
        'popular_items'             => null,
        'all_items'                 => __('All News Categories' ),
        'parent_item'               => __('Parent News Category'),
        'parent_item_colon'         => __('Parent News Category:'),
        'edit_item'                 => __('Edit News Category'),
        'view_item'                 => __('View News Category'),
        'update_item'               => __('Update News Category'),
        'add_new_item'              => __('Add New News Category'),
        'new_item_name'             => __('New News Category Name'),
        'separate_items_with_commas' =>  null,
        'choose_from_most_used'     =>  null ,
        'not_found'            => __('No News categories found.' ),
        'no_terms'                  => __( 'No News categories'  ),
        'items_list_navigation'=>__('Categories News list navigation'),
        'items_list'                 => __( 'News list'  ),
        /* translators: Tab heading when selecting from the most used terms. */
        'back_to_items'    => __( '&larr; Go to News Categories' )),

       

        'hierarchical' => true,
        'public' => true,
    ));


        
    }

add_filter("template_include", "AZ_news_template");
function AZ_news_template($template){
        global $post;
        if (is_single() AND $post->post_type =='news') {
            $template = plugin_path."templates/AZ_news.php";
            
            

        	
        }
        return $template;
        
}









