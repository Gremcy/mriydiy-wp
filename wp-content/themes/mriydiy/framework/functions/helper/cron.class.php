<?php

namespace PS\Functions\Helper;

/**
 * Class Cron
 * @package PS\Functions\Helper
 */
class Cron {

	/**
	 * constructor
	 */
	public function __construct() {
        // import
        add_action( 'init', array( $this, 'start_cron' ) );
	}

    /**
     * START CRON
     */
    public function start_cron() {
        if ( isset( $_GET['_cron'] ) ) {
            // sitemap
            update_option('generate_sitemap', self::generate_sitemap(), false);
        }

        return true;
    }

    /**
     * generate xml-sitemap
     */
    public static function generate_sitemap() {
        global $q_config;
        global $wp_query;
        $languages = qtranxf_getSortedLanguages();

        // start
        $dom = new \DOMDocument();
        $dom->xmlVersion = '1.0';
        $dom->encoding = 'UTF-8';
        $dom->formatOutput = true;
        $root = $dom->createElement('urlset');
        $attr = new \DOMAttr('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $root->setAttributeNode($attr);
        $attr = new \DOMAttr('xmlns:xhtml', 'http://www.w3.org/1999/xhtml');
        $root->setAttributeNode($attr);

        /* PAGES */
        // mainpage
        foreach ( $languages as $language ) {
            $node = $dom->createElement('url');
            $child_node = $dom->createElement('loc', htmlspecialchars(site_url( $language == $q_config['default_language'] ? '' : $language . '/' )));
            $node->appendChild($child_node);
            $child_node = $dom->createElement('lastmod', get_the_modified_time('Y-m-d', \PS::$front_page));
            $node->appendChild($child_node);
            $root->appendChild($node);
        }
        \PS\Functions\Helper\Helper::get_posts( ['camps', 'news', 'page'], 'publish', -1, 1, [], [], [], [62, 5556], 'post_type', 'DESC');
        $custom_query = $wp_query;
        if ( $custom_query->have_posts() ) {
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post();
                global $post;
                //
                foreach ( $languages as $language ) {
                    $node = $dom->createElement('url');
                    $child_node = $dom->createElement('loc', htmlspecialchars(site_url( ( $language == $q_config['default_language'] ? '' : $language . '/' ) . $post->post_name . '/' )));
                    $node->appendChild($child_node);
                    $child_node = $dom->createElement('lastmod', get_the_modified_time('Y-m-d', get_the_ID()));
                    $node->appendChild($child_node);
                    $root->appendChild($node);
                }
            }
        }
        wp_reset_query();

        // end
        $dom->appendChild($root);

        // save file
        $xml_file_name = ABSPATH . 'sitemap.xml';
        $dom->save($xml_file_name);

        return current_time('d.m.Y H:i');
    }

}