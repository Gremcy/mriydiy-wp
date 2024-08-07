<?php get_header(); ?>
<body class="contacts-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="contacts-main">
            <?php get_template_part('parts/_header'); ?>

            <div class="contacts-first-fluid">
                <div class="contacts-first-centered">
                    <div class="contacts-first-title"><?php echo get_the_title(); ?></div>
                    <div class="contacts-first-content">
                        <?php if(get_field('active_1')): ?>
                            <div class="contacts-first-left">
                                <?php $email = get_field('email'); if(is_array($email) && count($email)): ?>
                                    <div class="contacts-first-left-wrapper">
                                        <div class="contacts-first-left-bg1">
                                            <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon48.svg" alt="">
                                        </div>
                                        <div class="contacts-first-left-wrapper-head">
                                            <div class="contacts-first-left-wrapper-head-rect"></div>
                                            <span><?php the_field('title_1_1'); ?></span>
                                        </div>
                                        <div class="contacts-first-left-inner">
                                            <?php foreach ($email as $row): ?>
                                                <div class="contacts-first-left-item">
                                                    <div class="contacts-first-left-item-name"><?php echo $row['title']; ?></div>
                                                    <a href="mailto:<?php echo $row['email']; ?>" class="contacts-first-left-item-link"><?php echo $row['email']; ?></a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php $schools_type = get_terms(['taxonomy' => 'schools_type']); if(is_array($schools_type) && count($schools_type)): ?>
                                    <div class="contacts-first-left-wrapper">
                                        <div class="contacts-first-left-wrapper-head">
                                            <div class="contacts-first-left-wrapper-head-rect"></div>
                                            <span><?php the_field('title_1_2'); ?></span>
                                        </div>
                                        <?php foreach ($schools_type as $term): ?>
                                            <div class="contacts-first-left-item">
                                                <div class="contacts-first-left-item-name"><?php echo $term->name; ?></div>
                                                <?php
                                                global $wp_query;
                                                \PS\Functions\Helper\Helper::get_schools([$term->term_id]);
                                                $custom_query = $wp_query;
                                                ?>
                                                <?php if ( $custom_query->have_posts() ): ?>
                                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                        <div data-link="<?php the_field('map'); ?>" class="contacts-first-left-item-link target-link"><?php echo get_the_title(); ?></div>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                                <?php wp_reset_query(); ?>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>

                                <?php $phone = get_field('phone'); if(is_array($phone) && count($phone)): ?>
                                    <div class="contacts-first-left-wrapper">
                                        <div class="contacts-first-left-wrapper-head">
                                            <div class="contacts-first-left-wrapper-head-rect"></div>
                                            <span><?php the_field('title_1_3'); ?></span>
                                        </div>
                                        <?php foreach ($phone as $row): ?>
                                            <div class="contacts-first-left-item">
                                                <div class="contacts-first-left-item-name"><?php echo $row['title']; ?></div>
                                                <a href="tel:<?php echo $row['phone']; ?>" class="contacts-first-left-item-link binct-phone-number-1"><?php echo $row['phone']; ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('active_2')): ?>
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
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <?php if(get_field('active_3')): ?>
                <?php $list = get_field('list_3'); if(is_array($list) && count($list)): ?>
                    <?php
                    global $wp_query;
                    \PS\Functions\Helper\Helper::get_schools_by_ids($list);
                    $custom_query = $wp_query;
                    ?>
                    <?php if ( $custom_query->have_posts() ): ?>
                        <div class="contacts-school-fluid">
                            <div class="contacts-school-centered">
                                <div class="contacts-school-title"><?php the_field('title_3'); ?></div>
                                <div class="contacts-school-container contacts-school-slider">
                                    <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                        <?php get_template_part('parts/elements/school'); ?>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php wp_reset_query(); ?>
                <?php endif; ?>
            <?php endif; ?>

            <?php if(get_field('active_4')): ?>
                <?php get_template_part('parts/elements/social'); ?>
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