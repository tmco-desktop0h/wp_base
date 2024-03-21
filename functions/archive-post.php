<?php

/* --------------------------------------------  */
/* 対応エリア */
/* --------------------------------------------  */
add_action('init', 'area_register_post_type');
function area_register_post_type()
{
    register_post_type('area', array(
        'labels' => array(
            'name' => '対応エリア',
            'edit_item' => '対応エリアを編集',
        ),
        'public' => true,
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
            'excerpt'     
        ),
        'menu_position' => 5,
        'has_archive' => 'area',
        'menu_icon' => 'dashicons-admin-post',
    ));
}
// <------ Category ------->
add_action('init', 'create_area_category', 0);
function create_area_category()
{
    $labels = array(
        'name'              => _x('カテゴリー', 'カテゴリー', 'area'),
        'singular_name'     => _x('カテゴリー', 'カテゴリー', 'area'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'area/category'),
    );
    register_taxonomy('area_cat', array('area'), $args);
}
// <------ Tags ------->
add_action('init', 'create_area_tag', 0);
function create_area_tag()
{
    $labels = array(
        'name'              => _x('タグ', 'タグ', 'area'),
        'singular_name'     => _x('タグ', 'タグ', 'area'),
    );
    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        // 'rewrite'           => array('slug' => 'area/category'),
    );
    register_taxonomy('area_tag', array('area'), $args);
}
