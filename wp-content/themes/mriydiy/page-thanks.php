<?php get_header(); ?>
<?php
$type = get_query_var('section');

$pay_form = '';
$pay_link = '';
$order_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if($order_id && get_field('pay_status', $order_id) !== 'success'){
    $post_type = get_post_type(get_field('post_id', $order_id));
    if ($post_type === 'clubs') {
        $Pay = new \PS\Functions\Payment\Init();
        $pay_form = $Pay->get_payment_form( $order_id );
    } elseif($post_type === 'camps') {
        $Pay = new \PS\Functions\Payment\Init();
        $pay_link = $Pay->get_payment_link_monobank( $order_id );
    }
}
?>
<body class="thanks-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="thanks-main">
            <?php get_template_part('parts/_header'); ?>

            <div class="thanks-fluid">
                <div class="thanks-centered">
                    <div class="thanks-image">
                        <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon18.svg" alt="">
                    </div>

                    <?php $text = get_field('form_' . $type . '_success_1', \PS::$option_page) ?: get_field('form_entry_success_1', \PS::$option_page); if($text): ?>
                        <div class="thanks-title"><?php echo __($text); ?></div>
                    <?php endif; ?>
                    <?php $text = get_field('form_' . $type . '_success_2', \PS::$option_page) ?: get_field('form_entry_success_2', \PS::$option_page); if($text): ?>
                        <div class="thanks-description"><?php echo __($text); ?></div>
                    <?php endif; ?>

                    <?php if($pay_form): ?>
                        <a href="javascript:void(0)" class="thanks-pay-btn form-trigger">
                            <div class="thanks-pay-btn-bg"></div>
                            <span data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.."><?php _e('Оплатити', \PS::$theme_name ); ?></span>
                        </a>
                        <div class="pay-form" style="display: none"><?php echo $pay_form; ?></div>
                    <?php elseif($pay_link): ?>
                        <a href="<?php echo $pay_link; ?>" class="thanks-pay-btn">
                            <div class="thanks-pay-btn-bg"></div>
                            <span data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.."><?php _e('Оплатити', \PS::$theme_name ); ?></span>
                        </a>
                    <?php endif; ?>

                    <?php $pdf_about = get_field('pdf_about', \PS::$option_page); if($pdf_about): ?>
                        <a href="<?php echo $pdf_about; ?>" class="thanks-download" download>
                            <div class="thanks-download-btn">
                                <div class="hanks-download-btn-bg"></div>
                                <div class="thanks-download-btn-icon">
                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon20.svg" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="thanks-text-download"><?php _e('Завантажити презентацію про школу', \PS::$theme_name ); ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>
    <script>
        $(document).on('click', '.thanks-pay-btn', function() {
            $('.thanks-pay-btn span').html($('.thanks-pay-btn span').data('wait'));
            if($(this).hasClass('form-trigger')){
                $('.pay-form form').trigger('submit');
            }
        });
    </script>

    <?php if(in_array($type, ['school', 'kindergarten'])): ?>
        <script>
            $(document).ready(function() {
                fbq('track', 'Lead');
            });
        </script>
    <?php endif; ?>
    <?php /* END */ ?>

</body>
</html>