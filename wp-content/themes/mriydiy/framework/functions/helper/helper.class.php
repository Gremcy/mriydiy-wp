<?php

namespace PS\Functions\Helper;

/**
 * Class Helper
 * @package PS\Functions\Helper
 * @since   1.0.0
 */
class Helper {

    /**
     * Init constructor.
     */
    public function __construct() {
        // news
        add_filter('get_post_status', array( $this, 'fix_status' ), 10, 2);

        // canonical
        add_filter( 'get_canonical_url', array( $this, 'edit_canonical_urls') );
    }

    /**
     ******* GENERAL *******
     */
	 
	 // get posts by args
    public static function get_posts( $post_type, $post_status = 'publish', $posts_per_page = -1, $paged = 1, $meta_query = array(), $tax_query = array(), $post__in = array(), $post__not_in = array(), $orderby = 'menu_order', $order = 'ASC' ) {
        $args['post_type']      = $post_type;
        $args['post_status']    = $post_status;
        $args['posts_per_page'] = $posts_per_page;
        $args['paged'] = $paged;
        if ( count( $meta_query ) ) {
            $args['meta_query'] = $meta_query;
        }
        if ( count( $tax_query ) ) {
            $args['tax_query'] = $tax_query;
        }
        if ( count( $post__in ) ) {
            $args['post__in'] = $post__in;
        }
        if ( count( $post__not_in ) ) {
            $args['post__not_in'] = $post__not_in;
        }
        if($orderby){
            $args['orderby'] = $orderby;
        }
        if($order){
            $args['order'] = $order;
        }
        return query_posts( $args );
    }

    // status of news
    public function fix_status($post_status, $post) {
        if ($post->post_type == 'news' && $post_status == 'future') {
            return "publish";
        }
        return $post_status;
    }

    // words
    public static function numbers_in_words($n, $titles){
        $cases = array(2, 0, 1, 1, 1, 2);
        return $titles[($n % 100 > 4 && $n % 100 < 20) ? 2 : $cases[min($n % 10, 5)]];
    }

    // get month
    public static function get_month($n){
        $monthes = [
            __('січня', \PS::$theme_name),
            __('лютого', \PS::$theme_name),
            __('березня', \PS::$theme_name),
            __('квітня', \PS::$theme_name),
            __('травня', \PS::$theme_name),
            __('червня', \PS::$theme_name),
            __('липня', \PS::$theme_name),
            __('серпня', \PS::$theme_name),
            __('вересня', \PS::$theme_name),
            __('жовтня', \PS::$theme_name),
            __('листопада', \PS::$theme_name),
            __('грудня', \PS::$theme_name)
        ];
        return $monthes[$n - 1];
    }

    // get slug
    public static function get_slug($post_id){
        global $wpdb;
        return $wpdb->get_var("SELECT post_name FROM {$wpdb->posts} WHERE ID = {$post_id}");
    }

    // canonical
    public function edit_canonical_urls( $canonical_url ) {
        if ( is_page(\PS::$news_page) && get_query_var('section') ) {
            $canonical_url = get_the_permalink(\PS::$news_page) . 'filter/' . get_query_var('section') . '/';
            return $canonical_url;
        }
        return $canonical_url;
    }

    /**
     ******* FRONT PAGE *******
     */

    public static function get_video($terms){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'video',
            'publish',
            -1,
            1,
            [],
            [
                [
                    'taxonomy' => 'video_tags',
                    'field'    => 'term_id',
                    'terms'    => $terms
                ]
            ]
        );
    }

    public static function get_news(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'news',
            ['publish', 'future'],
            3,
            1,
            [],
            [],
            [],
            [],
            'date',
            'DESC'
        );
    }

    public static function get_calendar(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'news',
            ['publish', 'future'],
            -1,
            1,
            [],
            [
                [
                    'taxonomy' => 'news_tags',
                    'field'    => 'slug',
                    'terms'    => 'events'
                ]
            ],
            [],
            [],
            'date',
            'DESC'
        );
    }

    public static function get_team($post_id){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'team',
            'publish',
            -1,
            1,
            [],
            [],
            count($post_id) ? $post_id : [0],
            [],
            'post__in'
        );
    }

    public static function get_reviews(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'reviews',
            'publish',
            -1,
            1,
            [
                [
                    'key' => 'active',
                    'value' => '1'
                ]
            ],
            [],
            [],
            [],
            'rand'
        );
    }

    /**
     ******* CAMPS *******
     */

    // get camps
    public static function get_camps(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'camps'
        );
    }

    /**
     ******* CLUBS *******
     */

    // get clubs
    public static function get_clubs(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'clubs'
        );
    }

    /**
     ******* NEWS *******
     */

    // get news
    public static function get_all_news($page, $current_tag = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'news',
            ['publish', 'future'],
            get_field('posts_per_page', \PS::$news_page),
            $page,
            [],
            $current_tag ? [
                [
                    'taxonomy' => 'news_tags',
                    'field'    => 'slug',
                    'terms'    => $current_tag
                ]
            ] : [],
            [],
            [],
            'date',
            'DESC'
        );
    }

    // get other news
    public static function get_other_news($post_id){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'news',
            ['publish', 'future'],
            3,
            1,
            [],
            [],
            [],
            [$post_id],
            'date',
            'DESC'
        );
    }

    // save article view
    public static function save_news_view($post_id){
        $views = (int)get_option('news_view_' . $post_id);
        if($views){
            update_option('news_view_' . $post_id, ($views + 1));
        }else{
            add_option('news_view_' . $post_id, '1', '', 'no');
        }
        return true;
    }

    /**
     ******* TEAM *******
     */

    // get team
    public static function get_all_team($current_tag = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'team',
            'publish',
            -1,
            1,
            [],
            $current_tag ? [
                [
                    'taxonomy' => 'team_tags',
                    'field'    => 'slug',
                    'terms'    => $current_tag
                ]
            ] : []
        );
    }

    /**
     ******* DOCUMENTS *******
     */

    // get documents
    public static function get_documents($category){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'documents',
            'publish',
            -1,
            1,
            [],
            [
                [
                    'taxonomy' => 'document_section',
                    'field'    => 'term_id',
                    'terms'    => $category
                ]
            ]
        );
    }
	
	/**
     ******* FAQ *******
     */

    // get faq
    public static function get_faq(){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'faq'
        );
    }

    /**
     ******* CONTACTS *******
     */

    // get schools
    public static function get_schools($terms = false){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'schools',
            'publish',
            -1,
            1,
            [],
            $terms ? [
                [
                    'taxonomy' => 'schools_type',
                    'field'    => 'term_id',
                    'terms'    => $terms
                ]
            ] : []
        );
    }

    // get schools by ids
    public static function get_schools_by_ids($ids){
        // return
        return \PS\Functions\Helper\Helper::get_posts(
            'schools',
            'publish',
            -1,
            1,
            [],
            [],
            $ids,
            [],
            'post__in'
        );
    }
	
}