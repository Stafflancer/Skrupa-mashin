<?php
/*
Template Name: For Districts pages
*/
?>


<?php
get_header(); ?>

		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
			<div class="container-fluid section page-header">
				<div class="container">
					<div class="row align-items-center">
					<div class="col-md-8 page-title">
						<h1><?php the_title( ); ?></h1>						
					</div>
					<div class="col-md-4"><?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?></div>
					</div>
				</div>
			</div>
			<div class="main-content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
            <p style="text-align:center;"><img style="width:100%;" src="http://test-diol-2.pp.ua/wp-content/uploads/2018/12/map1.jpg" alt="" data-pagespeed-url-hash="1291096072" onload="pagespeed.CriticalImages.checkImageForCriticality(this);"></p>
			</div>
		<?php 
		// End the loop.
		endwhile;
		?>


<?php get_footer(); ?>

