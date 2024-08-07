<?php get_header(); ?>
<body class="faq-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="faq-main">
            <?php get_template_part('parts/_header'); ?>

            <?php
            global $wp_query;
            \PS\Functions\Helper\Helper::get_faq();
            $custom_query = $wp_query;
            ?>
            <?php if ( $custom_query->have_posts() ): ?>
                <div class="faq-fluid">
                    <div class="faq-centered">
                        <div class="faq-title"><?php echo get_the_title(); ?></div>
                        <div class="faq-container">
                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                <div class="faq-item">
                                    <div class="faq-item-top">
                                        <div class="faq-item-top-heading"><?php echo get_the_title(); ?></div>
                                        <div class="faq-item-top-arrow">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr5.svg" alt="">
                                        </div>
                                    </div>
                                    <div class="faq-item-drop"><?php echo get_field('answer'); ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php wp_reset_query(); ?>

            <?php if(get_field('active_2')): ?>
                <div class="faq-contacts-fluid">
                    <div class="faq-contacts-centered">
                        <div class="contacts-first-content">
                            <?php $title_2 = get_field('title_2'); if($title_2): ?>
                                <div class="contacts-first-left">
                                    <div class="faq-contacts-content-left"><?php echo $title_2; ?></div>
                                </div>
                            <?php endif; ?>
                            <div class="contacts-first-right">
                                <div class="contacts-first-right-tabs">
                                    <div class="contacts-first-right-tabs-item contacts-tab-question active">
                                        <div class="contacts-first-right-tabs-item-bg"></div>
                                        <span><?php _e(get_field('form_ask_title', \PS::$option_page)); ?></span>
                                    </div>
                                    <div class="contacts-first-right-tabs-item contacts-tab-call">
                                        <div class="contacts-first-right-tabs-item-bg"></div>
                                        <span><?php _e(get_field('form_call_title', \PS::$option_page)); ?></span>
                                    </div>
                                </div>
                                <?php get_template_part('parts/forms/ask', null, ['class' => 'contacts-first-right-form contacts-form-question show']); ?>
                                <?php get_template_part('parts/forms/call', null, ['class' => 'contacts-first-right-form contacts-form-call']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php get_template_part('parts/_footer'); ?>
        </main>

        <?php get_template_part('parts/_popups'); ?>
    </div>

    <?php /* DON'T REMOVE THIS */ ?>
    <?php get_footer(); ?>
    <?php /* END */ ?>

    <?php /* WRITE SCRIPTS HERE */ ?>

    <?php /* END */ ?>

</body>
</html>