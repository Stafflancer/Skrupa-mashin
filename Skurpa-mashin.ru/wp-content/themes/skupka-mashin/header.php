<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="icon" href="http://test-diol-2.pp.ua/favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="http://test-diol-2.pp.ua/favicon.png" type="image/x-icon" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- Font Awesome -->
  

  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
      header,
      .view {
        height: 650px;
      }
    }
    @media (min-width: 800px) and (max-width: 850px) {
              .navbar:not(.top-nav-collapse) {
                  background: #1C2331!important;
              }
          }
  </style>



  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="profile" href="https://gmpg.org/xfn/11" />
  <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
  <?php wp_head(); ?>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MDD4SKF');</script>
<!-- End Google Tag Manager -->
<script src="https://www.google.com/recaptcha/api.js?render=reCAPTCHA_site_key"></script>
  <script>
    /*
  grecaptcha.ready(function() {
      grecaptcha.execute('reCAPTCHA_site_key', {action: 'homepage'}).then(function(token) {
         ...
      });
  });
  */
  </script>
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MDD4SKF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<header class="classic-header">
<div class="container-fluid">
<div class="row">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <div class="branding">
          <div id="site-title" class="assistive-text">"ВЫКУП МАШИН МСК"</div>
          <div id="site-description" class="assistive-text">Выкуп автомобилей за 1 час. 95% рыночной цены! Эвакуатор и нотариус за наш счет. Выезд к клиенту бесплатно. Скупаем автомобили с выездом специалиста в Москве и области.</div>
          <a href="/" class="site-logo"><img class="logo preload-me" src="http://skupka-mashin.ru/wp-content/uploads/2017/12/logo-skupka-mashin75.jpg" srcset="http://skupka-mashin.ru/wp-content/uploads/2017/12/logo-skupka-mashin75.jpg 199w, http://skupka-mashin.ru/wp-content/uploads/2017/12/logo-skupka-mashin150.jpg 399w" width="199" height="75" sizes="199px" alt="&quot;ВЫКУП МАШИН МСК&quot;"></a>
          

              
              <div class="mini-widgets">
               <p>
                   <a href="https://api.whatsapp.com/send?phone=79252533380" target="_blank"><img src="/wp-content/uploads/2018/04/if_WhatsApp_1298775-1-e1546000126393.png" alt=""></a>
                  </p>

                  <p>
                    <a href="viber://chat?number=79252533380" target="_blank"><img src="/wp-content/uploads/2018/12/160623015059704524_f0_0-e1545999945534.png" alt=""></a>
                  </p>
              
              <p style="margin-right:10px;margin-left:10px;">Нажмите чтобы</br> начать чат</p>
                <div class="text-area show-on-desktop near-logo-first-switch in-menu-second-switch first last">
                <p class="dt-phone-header" style=""><i class="fa fa-mobile"></i><a href="tel:+79252533380"> +7 (925) 253-33-80</a></p>
                <p style="margin: -10px 0px 0px 25px;">Телефон в Москве</p>
                </div>
              </div>
        </div>
      <!-- Brand -->

      <!-- Collapse -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar">
        <div class="dt-close-mobile-menu-icon" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
        aria-expanded="false" aria-label="Toggle navigation"><span></span></div>
        <?php
          wp_nav_menu( array(
            'theme_location'    => 'primary',
            'depth'             => 2,
            // 'container'         => 'div',
            // 'container_class'   => '',
            // 'container_id'      => 'navbar',
            'menu_class'        => 'nav navbar-nav multi-column-dropdown',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
          ) );
        ?>
         <div class="mini-widgets mobile-only">
                <div class="text-area show-on-desktop near-logo-first-switch in-menu-second-switch first last">
                <p class="dt-phone-header" style=""><i class="fa fa-mobile"></i><a href="tel:+79252533380"> +7 (925) 253-33-80</a></p>
                <p style="margin: -10px 0px 0px 25px;">Телефон в Москве</p>
                </div>
          </div>
          <div class="navbar-nav nav-flex-icons">
            <a href="#form" class="dt-btn" id="default-btn-1"><span>Онлайн оценка авто</span></a>
          </div>
      </div>
    

    </div>
  </nav>
  </div>
  </div>
  <!-- Navbar -->
</header>
  <!--Main layout-->
  <div class="main">