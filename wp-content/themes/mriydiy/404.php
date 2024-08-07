<?php get_header(); ?>
<body class="error-page">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BW7DKZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- Meta Pixel Code -->
    <noscript><img loading="lazy" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1076032370482985&ev=PageView&noscript=1" alt=""/></noscript>
    <!-- End Meta Pixel Code -->

    <div class="fluid-wrapper">
        <main class="error-main">
            <?php get_template_part('parts/_header'); ?>

            <div class="error-content">
                <div class="error-icon">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon96.svg" alt="" />
                </div>
                <?php $field = get_field('title_404', \PS::$option_page); if($field): ?>
                    <div class="error-title"><?php echo __($field); ?></div>
                <?php endif; ?>
                <a href="<?php echo get_the_permalink(\PS::$front_page); ?>" class="error-link">
                    <?php $field = get_field('text_404', \PS::$option_page); if($field): ?>
                        <span><?php echo __($field); ?></span>
                    <?php endif; ?>
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon97.svg" alt="" />
                </a>
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