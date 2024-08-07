<?php if (!defined('ABSPATH')){exit;} ?>

<?php $cities = []; ?>

<div class="team-teachers-cards-item js-modal-link<?php $schools = get_field('school'); if(is_array($schools) && count($schools)): foreach($schools as $school_id): ?> school_<?php echo $school_id; ?><?php $city = get_field('city', $school_id); if(isset($city->name)): ?><?php $cities[$city->slug] = $city->name; ?><?php endif; ?><?php endforeach; ?><?php endif; ?>"<?php if(isset($args['term_id'])): ?> data-section="section_<?php echo $args['term_id']; ?>"<?php endif; ?> data-target="stuff-popup-<?php echo get_the_ID(); ?>"<?php if(isset($args['n']) && $args['n'] > 4): ?> style="display: none"<?php endif; ?>>
    <div class="team-teachers-cards-item-name"><?php echo get_the_title(); ?></div>
    <div class="team-teachers-cards-item-separator"></div>
    <?php $position = get_field('position'); if($position): ?>
        <div class="team-teachers-cards-item-post"><?php echo $position; ?></div>
    <?php endif; ?>
    <div class="team-teachers-cards-item-photo">
        <?php $icon = get_field('icon'); if($icon): ?>
            <div class="team-teachers-cards-item-photo-icon">
                <img loading="lazy" src="<?php echo \PS::$assets_url; ?>images/admin/big-icons/icon<?php echo $icon; ?>.svg" alt="">
            </div>
        <?php endif; ?>
        <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
            <div class="team-teachers-cards-item-photo-image">
                <img loading="lazy" src="<?php echo $img['sizes']['480x0']; ?>" alt="">

                <?php if(is_array($cities) && count($cities)): ?>
                    <?php foreach($cities as $slug => $city): ?>
                        <div class="team-teachers-cards-item-photo-city"<?php if($slug === 'lviv'): ?> style="background:#fff; color:#ff5c00"<?php endif; ?>><?php echo $city; ?></div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>