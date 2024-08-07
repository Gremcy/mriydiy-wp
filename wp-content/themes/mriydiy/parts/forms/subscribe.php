<?php if (!defined('ABSPATH')){exit;} ?>

<form class="news-subscribe-form parsley-form">
    <input name="action" value="add_new_subscribe" type="hidden">
    <input name="page" value="<?php echo get_the_title(); ?>" type="hidden">
    <input name="url" value="<?php echo get_the_permalink(); ?>" type="hidden">

    <div class="news-subscribe-input">
        <input id="subscribe-gtm-name" name="name" type="text" placeholder="<?php _e( 'Ваше імʼя', \PS::$theme_name ); ?> *" class="gtm-name parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="news-subscribe-input">
        <input id="subscribe-gtm-email" name="email" type="text" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="gtm-email parsley-check" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
        <div class="error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <button class="news-subscribe-button" type="submit" data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.." data-default="<?php _e( 'Підписатися', \PS::$theme_name ); ?>"><?php _e( 'Підписатися', \PS::$theme_name ); ?></button>
</form>