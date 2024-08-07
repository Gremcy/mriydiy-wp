<?php if (!defined('ABSPATH')){exit;} ?>

<form class="<?php echo isset($args['class']) ? $args['class'] : ''; ?> parsley-form">
    <input name="action" value="add_new_question" type="hidden">
    <input name="page" value="<?php echo get_the_title(); ?>" type="hidden">
    <input name="url" value="<?php echo get_the_permalink(); ?>" type="hidden">

    <div class="home-request-input">
        <input id="ask-gtm-name" name="name" type="text" placeholder="<?php _e( 'Ваше імʼя', \PS::$theme_name ); ?> *" class="gtm-name parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input id="ask-gtm-phone" name="phone" type="tel" placeholder="<?php _e( 'Телефон', \PS::$theme_name ); ?> *" class="gtm-phone phone_mask parsley-check" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input id="ask-gtm-email" name="email" type="text" placeholder="<?php _e( 'E-mail', \PS::$theme_name ); ?> *" class="gtm-email parsley-check" data-parsley-type="email" data-parsley-required="true" autocomplete="off">
        <div class="input-error-text">* <?php _e( 'помилка заповнення', \PS::$theme_name ); ?></div>
    </div>
    <div class="home-request-input">
        <input name="question" type="text" placeholder="<?php _e( 'Ваше запитання', \PS::$theme_name ); ?>" autocomplete="off">
    </div>
    <button class="home-request-button" type="submit" data-wait="<?php _e( 'Зачекайте', \PS::$theme_name ); ?>.." data-default="<?php _e( 'Надіслати', \PS::$theme_name ); ?>"><?php _e( 'Надіслати', \PS::$theme_name ); ?></button>
</form>