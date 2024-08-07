<?php

namespace PS\Functions\Seo;

/**
 * Class Rewrite
 * @package PS\Functions\Seo
 */
class Rewrite {

    /**
     * constructor
     */
    public function __construct() {
        // query_vars
        add_filter( 'query_vars', array( $this, 'add_query_vars_filter') );

        // rewrite
        add_action('init', array( $this, 'custom_rewrite_rule' ), 10, 0);
    }

    /**
     * query vars
     */
    public function add_query_vars_filter( $vars ) {
        $vars[] = 'section';
        $vars[] = 'chosen_city';

        // return
        return $vars;
    }

    /**
     * rewrite rules
     */
    public function custom_rewrite_rule() {
        // news
        add_rewrite_rule('^news/filter/([^/]*)/page/([^/]*)/?$','index.php?page_id=' . \PS::$news_page . '&section=$matches[1]&paged=$matches[2]','top');
        add_rewrite_rule('^news/filter/([^/]*)/?$','index.php?page_id=' . \PS::$news_page . '&section=$matches[1]','top');
        add_rewrite_rule('^news/page/([^/]*)/?$','index.php?page_id=' . \PS::$news_page . '&paged=$matches[1]','top');

        // thanks
        add_rewrite_rule('^thanks/([^/]*)/([^/]*)/?$','index.php?page_id=' . \PS::$thanks_page . '&section=$matches[1]&chosen_city=$matches[2]','top');
        add_rewrite_rule('^thanks/([^/]*)/?$','index.php?page_id=' . \PS::$thanks_page . '&section=$matches[1]','top');
    }
}