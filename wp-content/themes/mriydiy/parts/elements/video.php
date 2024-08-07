<?php if (!defined('ABSPATH')){exit;} ?>

<div class="home-videos-slider-item js-modal-link" data-target="youtube-popup-<?php echo get_the_ID(); ?>">
    <div class="home-videos-slider-item-inner">
        <div class="home-videos-slider-item-image">
            <div class="home-videos-slider-item-image-icon">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon52.svg" alt="">
            </div>
            <?php $video = get_field('video'); if($video): ?>
                <div class="home-videos-slider-item-image-img">
                    <img loading="lazy" src="https://i.ytimg.com/vi_webp/<?php preg_match('/src="([^"]+)"/', $video, $match); echo str_ireplace(['https://www.youtube.com/embed/', '?feature=oembed'], '', $match[1]); ?>/maxresdefault.webp" alt="">
                </div>
            <?php endif; ?>
            <?php /*
            <div class="home-videos-slider-item-image-logo">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/logo2.png" alt="">
            </div>
            */ ?>
        </div>
        <div class="home-videos-slider-item-center">
            <?php $term = get_field('video_tags'); if(isset($term->name)): ?>
                <div class="home-videos-slider-item-center-tag"><?php echo $term->name; ?></div>
            <?php endif; ?>
            <div class="home-videos-slider-item-center-date"><?php echo get_the_time('d.m.Y'); ?></div>
        </div>
        <div class="home-videos-slider-item-name"><?php echo get_the_title(); ?></div>
    </div>
</div>