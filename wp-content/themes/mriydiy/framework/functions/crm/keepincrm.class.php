<?php

namespace PS\Functions\Crm;

/**
 * Class Keepincrm
 * @package PS\Functions\Crm
 */
class Keepincrm {

    /**
     * url
     */
    protected $url;

    /**
     * webhooks
     */
    protected $webhooks;

    /**
     * constructor
     */
    public function __construct() {
        // vars
        $this->url = 'https://api.keepincrm.com/callbacks/webhook/';
        $this->webhooks = [
            // enter
            'school' => 'tfMiuB7gjy1t',
            'preschool' => 'stbZzKAedAaq',
            'kindergarten' => '6LUa3pYpfpP2',
            'online' => '1b5MWhSMSVYI',
            'externat' => 'tfMiuB7gjy1t', // default - tfMiuB7gjy1t
            'camp' => '7pz0lXoJH9gn',
            'club' => 'r97OHeEiua0i',
            'familyspace' => 'tfMiuB7gjy1t', // default - tfMiuB7gjy1t
            'other' => 'tfMiuB7gjy1t', // default - tfMiuB7gjy1t

            // question
            'question' => 'wiU0wIupcS24',

            // call
            'call' => 'N3vSY54ulLLJ'
        ];
    }

    // connect
    private function connect($webhook, $body = array()){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $this->url . $webhook);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
        $return = curl_exec($curl);
        curl_close($curl);

        // return
        return $return;
    }

    // send to Keepincrm
    public function send_to_keepincrm( $post_id ) {
        $data = [];
        $post_type = get_post_type( $post_id );

        // order
        if ( $post_type === 'enter' ) {
            $type = get_field('type', $post_id); if(isset($this->webhooks[$type['value']])) {
                // data
                $data['id'] = get_the_title($post_id);
                $data['title'] = 'Новий запис (' . $type['label'] . ')';

                $data['name'] = $data['company'] = get_field('name', $post_id);
                $data['phone'] = get_field('phone', $post_id);
                $data['email'] = get_field('email', $post_id);
                $data['age'] = get_field('age', $post_id);

                if ($type['value'] === 'camp') {
                    $data['camp'] = get_field('camp', $post_id);
                } elseif ($type['value'] === 'club') {
                    $data['club'] = get_field('club', $post_id);
                }

                if (in_array($type['value'], ['school', 'kindergarten'])) {
                    $data['city'] = get_field('city', $post_id);
                }

                $data['page'] = get_field('page', $post_id);
                $data['url'] = get_field('url', $post_id);

                $data['utm_medium'] = get_field('utm_medium', $post_id);
                $data['utm_source'] = get_field('utm_source', $post_id);
                $data['utm_campaign'] = get_field('utm_campaign', $post_id);
                $data['utm_term'] = get_field('utm_term', $post_id);
                $data['utm_content'] = get_field('utm_content', $post_id);

                // send
                $this->connect($this->webhooks[$type['value']], $data);
            }
        }

        // question
        elseif( $post_type === 'question' ){
            if(isset($this->webhooks[$post_type])) {
                // data
                $data['id'] = get_the_title($post_id);
                $data['title'] = 'Нове питання';

                $data['name'] = $data['company'] = get_field('name', $post_id);
                $data['phone'] = get_field('phone', $post_id);
                $data['email'] = get_field('email', $post_id);
                $data['question'] = get_field('question', $post_id);

                $data['page'] = get_field('page', $post_id);
                $data['url'] = get_field('url', $post_id);

                $data['utm_medium'] = get_field('utm_medium', $post_id);
                $data['utm_source'] = get_field('utm_source', $post_id);
                $data['utm_campaign'] = get_field('utm_campaign', $post_id);
                $data['utm_term'] = get_field('utm_term', $post_id);
                $data['utm_content'] = get_field('utm_content', $post_id);

                // send
                $this->connect($this->webhooks[$post_type], $data);
            }
        }

        // call
        elseif( $post_type === 'call' ){
            if(isset($this->webhooks[$post_type])) {
                // data
                $data['id'] = get_the_title($post_id);
                $data['title'] = 'Новий дзвінок';

                $data['name'] = $data['company'] = get_field('name', $post_id);
                $data['phone'] = get_field('phone', $post_id);

                $data['page'] = get_field('page', $post_id);
                $data['url'] = get_field('url', $post_id);

                $data['utm_medium'] = get_field('utm_medium', $post_id);
                $data['utm_source'] = get_field('utm_source', $post_id);
                $data['utm_campaign'] = get_field('utm_campaign', $post_id);
                $data['utm_term'] = get_field('utm_term', $post_id);
                $data['utm_content'] = get_field('utm_content', $post_id);

                // send
                $this->connect($this->webhooks[$post_type], $data);
            }
        }

        // return
        return true;
    }

}