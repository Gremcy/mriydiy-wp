<?php if (!defined('ABSPATH')){exit;} ?>

<a href="<?php echo get_the_permalink(); ?>" class="camp-list-item">
    <div class="camp-list-item-top">
        <div class="camp-list-item-title"><?php echo get_the_title(); ?></div>
        <?php $place = get_field('place'); if($place): ?>
            <div class="camp-list-item-location">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/icon56.svg" alt="">
                <span><?php echo $place; ?></span>
            </div>
        <?php endif; ?>
        <?php $description = get_field('description'); if($description): ?>
            <div class="camp-list-item-age"><?php echo mb_strtolower($description); ?></div>
        <?php endif; ?>
    </div>

    <div class="camp-list-item-down">
        <div class="camp-list-item-bottom">
            <?php $price = get_field('price'); if($price): ?>
                <div class="camp-list-item-bottom-price"><?php echo $price; ?></div>
            <?php endif; ?>
            <?php $dates = get_field('dates'); if(is_array($dates) && count($dates)): ?>
                <div class="camp-list-item-bottom-date">
                    <?php foreach ($dates as $date): ?>
                        <div class="camp-list-item-bottom-date-item">
                            <?php echo date('d.m', strtotime($date['start'])) . ($date['end'] ? ' - ' . date('d.m', strtotime($date['end'])) : '') ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="camp-list-item-btn"><?php _e( 'Записатися', \PS::$theme_name ); ?></div>
    </div>
</a>