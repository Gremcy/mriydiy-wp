<?php get_header(); ?>
<body class="thanks-page succesful-page">
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
                        <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/icon18.svg" alt="">
                    </div>
                    <?php $field = get_field('title'); if ($field): ?>
                        <div class="thanks-title"><?php echo $field; ?></div>
                    <?php endif; ?>
                    <?php $field = get_field('text'); if ($field): ?>
                        <div class="thanks-description"><?php echo $field; ?></div>
                    <?php endif; ?>
                    <?php $file = get_field('file'); if ($file['active']): ?>
                        <a href="<?php echo $file['file']; ?>" class="thanks-download" download>
                            <div class="thanks-download-btn">
                                <div class="hanks-download-btn-bg"></div>
                                <div class="thanks-download-btn-icon">
                                    <img loading="lazy" src="<?php echo PS::$assets_url; ?>images/icon20.svg" alt="">
                                </div>
                            </div>
                        </a>
                        <div class="thanks-text-download"><?php echo $file['text']; ?></div>
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

    <?php /* END */ ?>

</body>
</html>