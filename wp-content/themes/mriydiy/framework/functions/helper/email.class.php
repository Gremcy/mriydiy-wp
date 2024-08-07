<?php

namespace PS\Functions\Helper;

/**
 * Class Email
 * @package PS\Functions\Helper
 */
class Email {

    /**
     * constructor
     */
    public function __construct() {}

    // send email
    public function send_email( $to, $subject, $body, $attachments = array() ) {
        $headers   = array();
        $headers[] = 'From: МрійДій <info@' . str_ireplace(['http://', 'https://'], '', site_url()) . '>';
        $headers[] = 'Content-Type: text/html';
        $headers[] = 'charset=UTF-8';
        return wp_mail( $to, $subject, $body, $headers, $attachments );
    }

    // send notification
    public function send_notification( $post_id ) {

        // enter
        if ( get_post_type( $post_id ) === 'enter' ) {
            // to
            $to = get_field('form_entry_email', \PS::$option_page);

            // subject
            $subject = 'Нова заявка на сайті';

            // information
            $type = get_field('type', $post_id);
            $camp = get_field('camp', $post_id);
            $club = get_field('club', $post_id);
            $name = get_field('name', $post_id);
            $phone = get_field('phone', $post_id);
            $email = get_field('email', $post_id);
            $age = get_field('age', $post_id);
            $city = get_field('city', $post_id);
            $page = get_field('page', $post_id);
            $url = get_field('url', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/emails/enter.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // question
        elseif ( get_post_type( $post_id ) === 'question' ) {
            // to
            $to = get_field('form_ask_email', \PS::$option_page);

            // subject
            $subject = 'Нове питання на сайті';

            // information
            $name = get_field('name', $post_id);
            $phone = get_field('phone', $post_id);
            $email = get_field('email', $post_id);
            $question = get_field('question', $post_id);
            $page = get_field('page', $post_id);
            $url = get_field('url', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/emails/question.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // call
        elseif ( get_post_type( $post_id ) === 'call' ) {
            // to
            $to = get_field('form_call_email', \PS::$option_page);

            // subject
            $subject = 'Новий телефон на сайті';

            // information
            $name = get_field('name', $post_id);
            $phone = get_field('phone', $post_id);
            $page = get_field('page', $post_id);
            $url = get_field('url', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/emails/call.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // reviews
        elseif ( get_post_type( $post_id ) === 'reviews' ) {
            // to
            $to = get_field('form_reviews_email', \PS::$option_page);

            // subject
            $subject = 'Новий відгук на сайті';

            // information
            $name = get_field('name', $post_id);
            $phone = get_field('phone', $post_id);
            $email = get_field('email', $post_id);
            $child_name = get_field('child_name', $post_id);
            $child_age = get_field('child_age', $post_id);
            $text = get_field('text', $post_id);
            $page = get_field('page', $post_id);
            $url = get_field('url', $post_id);

            // html
            ob_start();
            include( locate_template( 'parts/emails/reviews.php' ) );
            $body = ob_get_contents();
            ob_end_clean();

            // send
            return $this->send_email( $to, $subject, $body );
        }

        // false
        else {
            return false;
        }
    }

}