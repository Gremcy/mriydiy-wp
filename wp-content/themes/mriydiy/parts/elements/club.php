<?php if (!defined('ABSPATH')){exit;} ?>

<?php
$filter_class = [];
$cities = [];
?>

<?php $schools = get_field('schools'); if(is_array($schools) && count($schools)): ?>
    <?php foreach($schools as $school_id): ?>
        <?php $filter_class[] = 'schools_' . $school_id; ?>

        <?php $city = get_field('city', $school_id); if(isset($city->name)): ?>
            <?php $cities[$city->slug] = $city->name; ?>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php foreach (['direction', 'age'] as $taxonomy): ?>
    <?php $terms = get_field($taxonomy); if(is_array($terms) && count($terms)): ?>
        <?php foreach($terms as $term): ?>
            <?php $filter_class[] = $taxonomy . '_' . $term->term_id; ?>
        <?php endforeach; ?>
    <?php endif; ?>
<?php endforeach; ?>

<a href="#<?php echo \PS\Functions\Helper\Helper::get_slug(get_the_ID()); ?>" class="camps-clubs-item visible <?php echo get_field('color_preview'); ?> <?php echo count($filter_class) ? implode(' ', $filter_class) : ''; ?> js-modal-link" data-target="club-popup-<?php echo get_the_ID(); ?>"<?php if(isset($args['n']) && $args['n'] > 9): ?> style="display: none"<?php endif; ?>>
    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
        <div class="camps-clubs-item-image">
            <img loading="lazy" src="<?php echo $img['sizes']['480x0']; ?>" alt="">

            <?php if(is_array($cities) && count($cities)): ?>
                <?php foreach($cities as $slug => $city): ?>
                    <div class="camps-clubs-item-city kyiv"<?php if($slug === 'lviv'): ?> style="background:#fff; color:#ff5c00"<?php endif; ?>><?php echo $city; ?></div>&nbsp;
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="camps-clubs-item-content">
        <div class="camps-clubs-item-name <?php echo get_field('color_preview_text'); ?>"><?php echo get_the_title(); ?></div>
        <?php $text = get_field('text'); if($text): ?>
            <div class="camps-clubs-item-text <?php echo get_field('color_preview_text'); ?>"><?php echo $text; ?></div>
        <?php endif; ?>
        <div class="camps-clubs-item-arrow <?php echo get_field('color_preview_arrow'); ?>">
            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 2L14 10L5 18" stroke="#E61777" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </div>
    </div>
</a>