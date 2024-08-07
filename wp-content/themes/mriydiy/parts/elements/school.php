<?php if (!defined('ABSPATH')){exit;} ?>

<div class="kindergarten-branches-item">
    <div class="kindergarten-branches-item-inner">
        <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
            <div class="kindergarten-branches-item-image">
                <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
                <?php $city = get_field('city'); if(isset($city->name)): ?>
                    <div class="kindergarten-branches-item-tag<?php if($city->slug === 'lviv'): ?> white<?php endif; ?>"><?php echo $city->name; ?></div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="kindergarten-branches-item-plane">
            <div class="kindergarten-branches-item-plane-name"><?php echo get_the_title(); ?></div>
            <?php $map = get_field('map'); if($map): ?>
                <div data-link="<?php echo $map; ?>" class="kindergarten-branches-item-plane-map target-link">
                    <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon54.svg" alt="">
                    <span><?php _e( 'Переглянути на карті', \PS::$theme_name ); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>