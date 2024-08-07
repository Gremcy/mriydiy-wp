<!DOCTYPE html>
<html lang="<?php echo \PS::$current_language; ?>">
<head>
    <meta charset="UTF-8">

	<title><?php $wp_title = wp_title('', false); echo $wp_title; ?></title>
    <meta name="description" content='<?php $context = PS::get_context(); echo $context['seo_description']; ?>'>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo \PS::$assets_url; ?>images/favicon.png" />
					
    <meta property="og:title" content="<?php echo $wp_title; ?>"/>					
    <meta property="og:description" content="<?php echo $context['seo_description']; ?>"/>					
    <meta property="og:type" content="website" />
    <?php
    $og_image = get_field('og_img', \PS::$option_page);
    if(is_singular() && !is_page()){
        $image = get_field('img');
    }elseif(is_page()){
        $image = get_field('img_1');
    }
    ?>
    <?php if(isset($image['sizes']['960x0'])): ?>
        <meta property="og:image" content="<?php echo $image['url']; ?>" />
    <?php elseif(isset($og_image['sizes']['960x0'])): ?>
        <meta property="og:image" content="<?php echo $og_image['url']; ?>" />
    <?php endif; ?>

    <?php if(is_page(['documents', 'publichyj-dogovir-oferta'])): ?>
        <meta name="robots" content="noindex,nofollow" />
    <?php endif; ?>

    <style>
        .form-input {display: none !important}
        .target-link{cursor: pointer;}
    </style>

    <meta name="facebook-domain-verification" content="7vkk385visxb1ozx9nxbf1muoik9oe" />

    <!-- Google tag (gtag.js) --><script async src="https://www.googletagmanager.com/gtag/js?id=G-K0FZ93G1W8"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-K0FZ93G1W8'); </script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-5BW7DKZ');</script>
    <!-- End Google Tag Manager -->

    <?php $fb_pixel = get_field('fb_pixel'); if($fb_pixel): ?>
        <?php echo $fb_pixel; ?>
    <?php else: ?>
        <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '1076032370482985');
            fbq('track', 'PageView');
        </script>
        <!-- End Meta Pixel Code -->
    <?php endif; ?>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://mriydiy.in.ua",
            "logo": "<?php echo \PS::$assets_url; ?>images/logo.svg",
            "name": "<?php echo $wp_title; ?>",
            "description": "<?php echo $context['seo_description']; ?>",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "Київ, Львів",
                "addressCountry": "UA"
            }
        }
    </script>

    <?php if(!is_front_page()): ?>
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BreadcrumbList",
                "itemListElement": [
                    {
                        "@type": "ListItem",
                        "position": 1,
                        "name": "<?php _e( 'Головна', \PS::$theme_name ); ?>",
                        "item": "<?php echo get_the_permalink(\PS::$front_page); ?>"
                    }
                    <?php if(is_singular(['camps'])): ?>
                    ,{
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo get_the_title(\PS::$camps_page); ?>",
                        "item": "<?php echo get_the_permalink(\PS::$camps_page); ?>"
                    },{
                        "@type": "ListItem",
                        "position": 3,
                        "name": "<?php echo get_the_title(); ?>"
                    }
                    <?php elseif(is_singular(['news'])): ?>
                    ,{
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo get_the_title(\PS::$news_page); ?>",
                        "item": "<?php echo get_the_permalink(\PS::$news_page); ?>"
                    },{
                        "@type": "ListItem",
                        "position": 3,
                        "name": "<?php echo get_the_title(); ?>"
                    }
                    <?php else: ?>
                    ,{
                        "@type": "ListItem",
                        "position": 2,
                        "name": "<?php echo get_the_title(); ?>"
                    }
                    <?php endif; ?>
                ]
            }
        </script>
    <?php endif; ?>

    <?php if(is_front_page() || is_page(\PS::$contacts_page)): ?>

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "EducationalOrganization",
                "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "Київ",
                    "addressRegion": "UA",
                    "postalCode": "04176",
                    "streetAddress": "вул. Набережно-Рибальська, 5А"
                },
                "name": "Школа MRIYDIY, Київ"
            }
        </script>

    <?php elseif(is_singular('news')): ?>

        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "NewsArticle",
                "headline": "<?php echo addslashes(get_the_title()); ?>",
                "image": [
                    <?php $img = get_field('img'); if(is_array($img) && count($img)): ?>
                      "https://mriydiy.in.ua/wp-content/uploads/vijskovi.jpg"
                    <?php endif; ?>
                ],
                "datePublished": "<?php echo get_the_time('Y-m-d'); ?>",
                "dateModified": "<?php echo get_the_modified_time('Y-m-d'); ?>",
                "author": [{
                    "@type": "Person",
                    "name": "Автор mriydiy.in.ua",
                    "url": "https://mriydiy.in.ua/author/"
                }]
            }
        </script>

    <?php elseif(is_page(\PS::$faq_page)): ?>

        <?php
        $n = 1;
        global $wp_query;
        \PS\Functions\Helper\Helper::get_faq();
        $custom_query = $wp_query;
        ?>
        <?php if ( $custom_query->have_posts() ): ?>
            <script type="application/ld+json">
                {
                    "@context": "https://schema.org",
                    "@type": "FAQPage",
                    "mainEntity": [
                      <?php while ( $custom_query->have_posts() ): $custom_query->the_post(); ?>
                        {
                        "@type": "Question",
                        "name": "<?php echo addslashes(get_the_title()); ?>",
                        "acceptedAnswer": {
                            "@type": "Answer",
                            "text": "<?php echo addslashes(get_field('answer')); ?>"
                          }
                        }<?php if($custom_query->found_posts !== $n): ?>,<?php endif; ?>
                        <?php $n++; ?>
                      <?php endwhile; ?>
                    ]
                }
            </script>
        <?php endif; ?>
        <?php wp_reset_query(); ?>

    <?php endif; ?>

    <?php /* DON'T REMOVE THIS */ ?>
	<?php wp_head(); ?>
	<?php /* END */ ?>
</head>