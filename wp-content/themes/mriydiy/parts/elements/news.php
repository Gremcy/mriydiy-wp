<?php if (!defined('ABSPATH')){exit;} ?>

<a href="<?php echo get_the_permalink(); ?>" class="news-item">
    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
        <div class="news-item-image">
            <img loading="lazy" src="<?php echo $img['sizes']['960x0']; ?>" alt="">
            <?php $term = get_field('news_tags'); if(isset($term->term_id)): ?>
                <div class="news-item-tag"><?php echo $term->name; ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    <div class="news-item-name"><?php echo get_the_title(); ?></div>
    <?php $news_tags = get_field('news_tags'); if(isset($news_tags->term_id) && $news_tags->term_id === 9): ?>
        <?php $dates = get_field('dates'); if(is_array($dates) && count($dates)): ?>
            <div class="one-news-date"><?php foreach ($dates as $m => $date): ?><?php echo date('d/m/Y', strtotime($date['start'])); ?><?php if($m < (count($dates) - 1)): ?>, <?php endif; ?><?php endforeach; ?></div>
        <?php else: ?>
            <div class="one-news-date"><?php echo get_the_time('d/m/Y'); ?></div>
        <?php endif; ?>
    <?php else: ?>
        <div class="one-news-date"><?php echo get_the_time('d/m/Y'); ?></div>
    <?php endif; ?>
</a>