<?php get_header(); ?>
   <script>
        function init() {
        var imgDefer = document.getElementsByTagName('img');
        for (var i=0; i<imgDefer.length; i++) {
        if(imgDefer[i].getAttribute('data-src')) {
        imgDefer[i].setAttribute('src',imgDefer[i].getAttribute('data-src'));
        } } }
        window.onload = init;
    </script>     

        <!---  top-section ROW  -->  
        <?php get_template_part( 'template-parts/content/content', 'top-section' ); ?>

        <!---  quaestions ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'quaestions' ); ?>
   
        <!---  schema ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'schema' ); ?>

        <!---  reviews ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'reviews' ); ?>

        <!---  advantages ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'advantage' ); ?>

        <!---  CARS MODELS ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'models-car' ); ?>
        <!---  END CARS MODELS ROW  -->

        <!---  contact form ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'contact-form' ); ?>

        <!---  what-car ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'what-car' ); ?>


        <!---  sale applications ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'sale-applications' ); ?>

        <!---  map ROW  -->
        <?php get_template_part( 'template-parts/content/content', 'map' ); ?>
       <p style="text-align:center;"><img style="width:100%;" data-src="/wp-content/uploads/map1.jpg" alt=""></p>


<?php get_footer(); ?>