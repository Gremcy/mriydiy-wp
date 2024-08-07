<?php get_header(); ?>
<body class="documents-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="documents-main">
            <?php get_template_part('parts/_header'); ?>

            <div class="documents-fluid">
                <div class="documents-centered">
                    <div class="documents-title"><?php echo get_the_title(); ?></div>
                    <div class="documents-container">
                        <?php $document_sections = get_terms(['taxonomy' => 'document_section']); if(is_array($document_sections) && count($document_sections)): ?>
                            <?php foreach ($document_sections as $document_section): ?>
                                <div class="documents-item">
                                    <div class="documents-item-top">
                                        <div class="documents-item-top-heading">
                                            <div class="documents-item-top-heading-icon">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon50.svg" alt="">
                                            </div>
                                            <span><?php echo $document_section->name; ?></span>
                                            <div class="documents-item-top-heading-arrow">
                                                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/arr6.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    global $wp_query;
                                    \PS\Functions\Helper\Helper::get_documents($document_section->term_id);
                                    $custom_query = $wp_query;
                                    ?>
                                    <?php if ( $custom_query->have_posts() ): ?>
                                        <div class="documents-item-drop">
                                            <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                                                <a href="<?php echo get_field('file'); ?>" class="documents-item-drop-link" target="_blank">
                                                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon51.svg" alt="">
                                                    <span><?php echo get_the_title(); ?></span>
                                                </a>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php wp_reset_query(); ?>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p><?php _e( 'Нічого не знайдено.', \PS::$theme_name ); ?></p>
                        <?php endif; ?>
                    </div>
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

    <?php /* END */ ?>

</body>
</html>