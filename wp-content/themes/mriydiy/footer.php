<?php /* DON'T REMOVE THIS */ ?>
<?php wp_footer(); ?>
<?php /* END */ ?>

<script type="text/javascript">
    (function(d, w, s) {
    var widgetHash = 'lqgi0tk4c6816cyqv3n4', ctw = d.createElement(s); ctw.type = 'text/javascript'; ctw.async = true;
    ctw.src = '//widgets.binotel.com/calltracking/widgets/'+ widgetHash +'.js';
    var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(ctw, sn);
    })(document, window, 'script');
</script>
<script type="text/javascript">
    (function(d, w, s) {
    var widgetHash = '85d2qp52f1p088fw472b', gcw = d.createElement(s); gcw.type = 'text/javascript'; gcw.async = true;
    gcw.src = '//widgets.binotel.com/getcall/widgets/'+ widgetHash +'.js';
    var sn = d.getElementsByTagName(s)[0]; sn.parentNode.insertBefore(gcw, sn);
    })(document, window, 'script');
</script>

<?php if(!isset($_COOKIE['hide-cookies-banner'])): ?>
    <script>
        // cookies
        function setCookie(key, value, expiry) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';expires=' + expires.toUTCString() + ';path=/';
        }
        $(document).on('click', '.cookies-accept-button', function() {
            $('.cookie-consent-banner').remove();
            setCookie('hide-cookies-banner', '1', '7');
        });
    </script>
<?php endif; ?>

<script>
    // popup next button
    $(document).on('click', '.popup-next', function() {
        var type = $(this).data('type');
        var this_popup = $(this).parents('.' + type);
        var next_popup = this_popup.next('.' + type);
        var first_popup = $('.' + type).first();

        this_popup.hide().removeClass("is-open");
        if(next_popup.length){
            next_popup.fadeIn(100).addClass("is-open");
        }else{
            first_popup.fadeIn(100).addClass("is-open");
        }
    });
</script>

<script>
    // forms
    // phone mask
    $(document).ready(function () {
        var phones = $('.phone_mask');
        if (phones.length) {
            phones.each(function () {
                Inputmask({"mask": "+389999999999", "clearIncomplete": true}).mask($(this).get(0));
            });
        }
    });

    // validation
    function trigger_parsley(form){
        var valid = true;
        // check inputs
        var inputs = form.find('.parsley-check');
        inputs.each(function(){
            $(this).parent().removeClass('error');
            if($(this).parsley().isValid() === false){
                $(this).parent().addClass('error');
                valid = false;
            }
        });
        // return
        return valid;
    }
    $(document).on('keyup keypress change', '.parsley-check', function() {
        if($(this).parent().hasClass('error')){
            var form = $(this).parents('.parsley-form');
            if(form.length){
                trigger_parsley(form);
            }
        }
    });

    // add post_id
    $(document).on('change', '.parsley-form select[name="camp"], .parsley-form select[name="club"]', function() {
        var select = $(this);
        var form = select.parents('.parsley-form');
        var post_id = parseInt(select.find('option:selected').data('post_id'));
        if(post_id){
            form.find('input[name="post_id"]').val(post_id);
        }else{
            form.find('input[name="post_id"]').val('');
        }
    });

    // send form
    var no_block = true;
    $(document).on('submit', '.parsley-form', function() {
        var form = $(this);
        if(trigger_parsley(form) && no_block) {
            // ajax
            var formData = new FormData(form[0]);
            $.ajax({
                url: '/wp-admin/admin-ajax.php',
                data: formData,
                type: 'POST',
                dataType: 'json',
                cache: false,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    // block
                    no_block = false;

                    // button
                    form.find('[type="submit"]').html(form.find('[type="submit"]').data('wait'));
                },
                success: function (data) {
                    if (data.success) {
                        // reset
                        form.find('input, textarea').each(function (){
                            $(this).val('');
                        });

                        // success
                        window.location.href = data.url;
                    }else{
                        // button
                        form.find('[type="submit"]').html(form.find('[type="submit"]').data('default'));

                        // allow sending
                        no_block = true;
                    }
                }
            });
        }
        return false;
    });

    $(document).ready(function() {
        $('.target-link').click(function (e) {
            var link = $(this).data('link') || $(e.target).data('link');
            if (link) {
                window.open(link, '_blank', 'noopener,noreferrer');
            }
            return false;
        });
    });
</script>
