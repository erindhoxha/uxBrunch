
<?php
function social_media_post_type(){

$labels = array(
'name' => 'Social Media',
'singular_name' => 'Social Media',
'add_new' => 'Add New' );

$args = array('labels' => $labels,

'hierarchical' => true,
'publicly_queryable' => true,
'public' => true,
'has_archive' => false,
'menu_icon'=> 'dashicons-layout',
'rewrite' => array('slug' => 'footer'),
'show_in_rest' => true,
'show_in_nav_menus' => true,
'supports' => array('title') );

register_post_type('socialMedia', $args);
}

add_action('init', 'social_media_post_type');