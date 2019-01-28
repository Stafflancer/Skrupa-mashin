  </div>
  <!--Main layout-->

  <div class="maps container-fluide">
    
  </div>


<!-- Footer -->
<footer class="page-footer font-small elegant-color-dark pt-4">

    <!-- Footer Links -->
    <div class="container text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-3 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase">“ВЫКУП МАШИН”</h5>
          <p>г. Москва, метро Скобелевская,улица Изюмская 49 к1</p>
          <a href="">Посмотреть на карте</a>

        </div>
        <!-- Grid column -->


        <!-- Grid column -->
        <div class="col-md-3 mb-md-0 mb-2">

            <!-- Links -->
            <h5>Контакты</h5>
            <p>Телефон в г. Москве</p>
            <a href="">+7 (925) 253-33-80</a>

          </div>
          <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none pb-6">



          <!-- Grid column -->
          <div class="col-md-3 mb-md-0 mb-6">

            <!-- Links -->
             <!--<h5 class="text-uppercase">Links</h5>-->

            <ul class="list-unstyled">
              <li>
                <a href="/skupka-avto-v-razbor/">Скупка авто в разбор в Москве</a>
              </li>
              <li>
                <a href="/vykup-skupka-avtomobilej-v-lyubom-sostoyanii/">Выкуп и скупка автомобилей в любом состоянии</a>
              </li>
              <li>
                <a href="/vykup-skupka-avarijnykh-avtomobilej/">Выкуп и скупка аварийных автомобилей в Москве и Московской области (битых, после ДТП, после аварии)</a>
              </li>
              <li>
                <a href="/perekup-avtomobilej-v-krasnoyarske-perekupshhik">Услуги перекупщика</a>
              </li>
              <li>
                <a href="/srochnyj-vykup-avto-mitishi">Выкуп в Мытищах</a>
              </li>
            </ul>

          </div>
          <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-left py-3">
      <div class="container">Сайт сделан в "Агенстве Автомобильных Технологий"</div>
    </div>
    <!-- Copyright -->

  </footer>  
  <!--/.Footer-->
  <a href="#" class="scroll-top"><span>&#8593;</span></a>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">

  <!-- Material Design Bootstrap -->
  <link href="<?php echo get_template_directory_uri(); ?>/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->

  <link href="<?php echo get_template_directory_uri(); ?>/css/style.min.css" rel="stylesheet">


  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/mdb.min.js"></script>

   <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">

  $('.dt-close-mobile-menu-icon').on('click', function(){
      $('.navbar-collapse').collapse('hide');
  });

  $(window).scroll(function() {
    if($(this).scrollTop()>250) {
        $( ".navbar" ).addClass("fixed-top scrolling-navbar top-nav-collapse");
    } else {
        $( ".navbar" ).removeClass("fixed-top scrolling-navbar top-nav-collapse");
    }
});
    // Animations initialization
    new WOW().init();



    ( function() {

        var youtube = document.querySelectorAll( ".youtube" );
        
        for (var i = 0; i < youtube.length; i++) {
            
            var source = "https://img.youtube.com/vi/"+ youtube[i].dataset.embed +"/sddefault.jpg";
            
            var image = new Image();
                    image.src = source;
                    image.addEventListener( "load", function() {
                        youtube[ i ].appendChild( image );
                    }( i ) );
            
                    youtube[i].addEventListener( "click", function() {

                        var iframe = document.createElement( "iframe" );

                                iframe.setAttribute( "frameborder", "0" );
                                iframe.setAttribute( "allowfullscreen", "" );
                                iframe.setAttribute( "src", "https://www.youtube.com/embed/"+ this.dataset.embed +"?rel=0&showinfo=0&autoplay=1" );

                                this.innerHTML = "";
                                this.appendChild( iframe );
                    } );    
        };
        
    } )();


  </script>

  <style type="text/css">
    


.youtube {
    background-color: #000;
    margin-bottom: 30px;
    position: relative;
    padding-top: 56.25%;
    overflow: hidden;
    cursor: pointer;
}
.youtube img {
    width: 100%;
    top: -16.82%;
    left: 0;
    opacity: 0.7;
}
.youtube .play-button {
    width: 90px;
    height: 60px;
    background-color: #333;
    box-shadow: 0 0 30px rgba( 0,0,0,0.6 );
    z-index: 1;
    opacity: 0.8;
    border-radius: 6px;
}
.youtube .play-button:before {
    content: "";
    border-style: solid;
    border-width: 15px 0 15px 26.0px;
    border-color: transparent transparent transparent #fff;
}
.youtube img,
.youtube .play-button {
    cursor: pointer;
}
.youtube img,
.youtube iframe,
.youtube .play-button,
.youtube .play-button:before {
    position: absolute;
}
.youtube .play-button,
.youtube .play-button:before {
    top: 50%;
    left: 50%;
    transform: translate3d( -50%, -50%, 0 );
}
.youtube iframe {
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
}

  </style>

  <?php wp_footer(); ?>
  <script type="text/javascript">
    $(document).ready(function(){
  height=$('.no-big').height();
  $('.page-footer').css('margin-top',height);
  setInterval(function() {
  height=$('.no-big').height();
  $('.page-footer').css('margin-top',height);
}, 1000);
  $('input[name="post_title"]').attr('hidden',true);
      $('textarea[name="post_content"]').attr('hidden',true);
  $(document).on('click','.oplata-go',function(){
    model=$('input[name="text-marka-moodel"]').val();
    price=$('input[name="text-price"]').val();
    year=$('input[name="text-year"]').val();
    obiem=$('input[name="text-obiem"]').val();
    opis=$('textarea[name="text_message"]').val();
    //foto1=$('input[name="file-photo1"]').val().replace(/C:\\fakepath\\/i, '')
    //alert(foto1);

      model='Хочу продать '+model+' за '+price;
      $('input[name="post_title"]').val(model);
      $('textarea[name="post_content"]').val('Год выпуска: '+year+', объем двигателя: '+obiem+'. Состояние автомобиля: '+opis);
      //$('input[name="post_content"]').val('<img src="http://test-diol-2.pp.ua/wp-content/themes/skupka-mashin/img/'+foto+'">');

    
  })

})
  </script>

</body>

</html>