<?php

namespace PS\Functions\Payment;

/**
 * Class Init
 * @package     PS\Functions\Payment
 * @since       1.0.0
 */
class Init {

    /**
     * Enable initialization
     * @return bool
     */
    public static function is_initialize() {
        return true;
    }

    /**
     * Init constructor.
     */
    public function __construct() {
        // результат оплаты
        if(isset($_GET['check_liqpay_result'])){
            $this->check_liqpay_result();
        }
        if(isset($_GET['check_monobank_pay_result'])){
            $this->check_monobank_pay_result();
        }
    }

    // check payment active
    public static function check_payment_active($post_id){
        $payment_active = (bool)get_field( 'payment_active', $post_id );
        $payment_sum = (int)get_field( 'payment_sum', $post_id );
        $term_id = (int)get_field( 'liqpay', $post_id ); // city
        return $payment_active && $payment_sum && $term_id ? true : false;
    }

    /**
     * LIQPAY
     */

    // генеруємо форму для оплати
    public function get_payment_form($order_id) {
        $return = '';

        // check
        if ( get_post_type( $order_id ) === 'enter' ) {
            $pay_status = get_field( 'pay_status', $order_id );
            if($pay_status !== 'success_payment'){
                $post_id = (int)get_field( 'post_id', $order_id );
                $payment_active = (bool)get_field( 'payment_active', $post_id );
                $payment_sum = (int)get_field( 'payment_sum', $post_id );
                $term_id = (int)get_field( 'liqpay', $post_id ); // city
                $public_key = get_field( 'public_key', 'term_' . $term_id ); // public_key
                $private_key = get_field( 'private_key', 'term_' . $term_id ); // private_key

                if($post_id && $payment_active && $payment_sum && $term_id && $public_key && $private_key){
                    // data
                    $params = array(
                        // required
                        'version'             => 3,
                        'action'              => 'pay',
                        'amount'              => $payment_sum,
                        'currency'            => 'UAH',
                        'description'         => 'Оплата заявки' . ' #' . sprintf( '%05d', $order_id ) . ' ' . 'на сайті mriydiy.in.ua',
                        'order_id'            => $order_id,

                        // optional
                        'language'            => str_ireplace('ua', 'uk', \PS::$current_language),
                        'result_url'          => \PS\Functions\Plugins\Qtranslate::current_site_url( '/success/' ),
                        'server_url'          => site_url( '/?check_liqpay_result=1' ),
                    );
                    $LiqPay = new LiqPay( $public_key, $private_key );
                    $return = $LiqPay->cnb_form($params);
                }
            }
        }
        //
        return $return;
    }

    // перевіряємо статус оплати
    public function check_liqpay_result() {
        // 1. check post-data
        if ( isset( $_POST['data'] ) && isset( $_POST['signature'] ) ) {
            $data        = $_POST['data'];
            //$signature   = base64_encode( sha1( $this->private_key . $data . $this->private_key, true ) );
            $parsed_data = json_decode( base64_decode( $data ), true );
            $order_id    = (int) $parsed_data['order_id'];
            //if ( $signature == $_POST['signature'] ) {
                // 2. check status
                $pay_info = 'Сума' . ': ' . $parsed_data['amount'] . ' ' . $parsed_data['currency'];
                $pay_info .= '; ' . 'Статус оплати' . ': ' . $parsed_data['status'];
                // success
                if ( $parsed_data['status'] == 'success' ) {
                    $pay_status = 'success_payment';
                    $pay_info   .= '; ' . 'ID платежу' . ': ' . $parsed_data['payment_id'];
                } // error
                elseif ( $parsed_data['status'] == 'failure' || $parsed_data['status'] == 'error' ) {
                    $pay_status = 'not_payment';
                    $pay_info   .= '; ' . 'Помилка' . ': ' . $parsed_data['err_code'] . ' (' . $parsed_data['err_description'] . ')' . '; ' . 'ID платежу' . ': ' . $parsed_data['payment_id'];
                } // other
                else {
                    $pay_status = 'wait_payment';
                    $pay_info   .= '; ' . 'ID платежу' . ': ' . $parsed_data['payment_id'];
                }

                // 3. save to DB
                update_field( "field_65001e00588ea", $pay_status, $order_id ); // status
                update_field( "field_65001e34588eb", $pay_info, $order_id ); // information
            //}
        }
    }


    /**
     * MONOBANK
     */

    // лінк для оплати через монобанк
    public function get_payment_link_monobank($order_id) {
        $return = '';

        // check
        if ( get_post_type( $order_id ) === 'enter' ) {
            $pay_status = get_field( 'pay_status', $order_id );

            if($pay_status !== 'success_payment'){
                $post_id = (int)get_field( 'post_id', $order_id );
                $payment_active = (bool)get_field( 'payment_active', $post_id );
                $payment_sum = (int)get_field( 'payment_sum', $post_id );
                $term_id = (int)get_field( 'liqpay', $post_id ); // city
                $token = get_field( 'token', 'term_' . $term_id ); // token
                $name = get_the_title($post_id);
                if($post_id && $payment_active && $payment_sum && $term_id){
                    // data
                    $params = array(
                        // required
                        'name'                => $name,
                        'action'              => 'pay',
                        'amount'              => $payment_sum,
                        'currency'            => Monobank::CURRENCY_UAH,
                        'description'         => 'Оплата заявки' . ' #' . sprintf( '%05d', $order_id ) . ' ' . 'на сайті mriydiy.in.ua',
                        'order_id'            => $order_id
                    );
                    $Mono = new Monobank( $token, null, \PS\Functions\Plugins\Qtranslate::current_site_url( '/success/' ), site_url( '/?check_monobank_pay_result=1' ) );
                    $return = $Mono->generatePaymentLink($params);
                    $return = json_decode($return, true);
                    $return = isset($return['pageUrl']) ? $return['pageUrl'] : '';
                }
            }
        }

        //
        return $return;
    }

    // результат оплати
    public function check_monobank_pay_result() {
        $jsonStr = file_get_contents("php://input");
        $parsed_data = json_decode($jsonStr, true);
        if ( isset( $parsed_data['invoiceId'] )) {
            $order_id = (int) $parsed_data['reference'];

            $pay_info = 'Сума' . ': ' . ($parsed_data['amount'] / 100) . ' UAH';
            $pay_info .= '; ' . 'Статус оплати' . ': ' . $parsed_data['status'];

            // success
            if ( $parsed_data['status'] == 'success' ) {
                $pay_status = 'success_payment';
                $pay_info   .= '; ' . 'ID платежу' . ': ' . $parsed_data['invoiceId'];
            } // error
            elseif ( $parsed_data['status'] == 'failure' || $parsed_data['status'] == 'expired' ) {
                $pay_status = 'not_payment';
                $pay_info   .= '; ' . 'Помилка' . ': ' . $parsed_data['err_code'] . ' (' . $parsed_data['failureReason'] . ')' . '; ' . 'ID платежу' . ': ' . $parsed_data['invoiceId'];
            } // other
            else {
                $pay_status = 'wait_payment';
                $pay_info   .= '; ' . 'ID платежу' . ': ' . $parsed_data['invoiceId'];
            }

            update_field( "field_65001e00588ea", $pay_status, $order_id ); // status
            update_field( "field_65001e34588eb", $pay_info, $order_id ); // information
        }
    }

}