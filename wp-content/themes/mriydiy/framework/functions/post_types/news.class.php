<?php

namespace PS\Functions\Post_Types;

/**
 * Class News
 * @package PS\Functions\Post_Types
 */
class News {

    /**
     * constructor
     */
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        add_action( 'init', array( $this, 'register_taxonomies' ), 0 );
    }

    /**
     * post type
     */
    public function register_post_type() {
        $labels = array(
            'name'               => __( 'Новини та події', \PS::$theme_name ),
            'add_new'            => __( 'Додати запис', \PS::$theme_name ),
            'new_item'           => __( 'Новий запис', \PS::$theme_name )
        );

        $args = array(
            'labels'             => $labels,
            'show_ui'             => true,
            'public'              => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'hierarchical'        => false,
            'query_var'           => true,
            'supports'            => array( 'title' ),
            'has_archive'         => false
        );

        register_post_type( 'news', $args );
    }

    public function register_taxonomies(){
        $labels = array(
            'name'              => __( 'Категорії', \PS::$theme_name ),
            'add_new_item'      => __( 'Додати категорію', \PS::$theme_name ),
            'new_item_name'     => __( 'Нова категорія', \PS::$theme_name )
        );

        $args = array(
            'hierarchical'      => false,
            'labels'            => $labels,
            'show_admin_column' => true
        );

        register_taxonomy( 'news_tags', 'news', $args );
    }
}