<?php
/*
* Template name: Reviews page
*/
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
					<div class="col-md-12 content">
						<?php the_content(); ?>
					</div>
					<!--<div class="col-md-3 sidebar">
						<?php/* get_sidebar(); */?>
					</div>-->
				</div>
			</div>
			</div>
		<?php 
		// End the loop.
		endwhile;
		?>


<?php get_footer(); ?>
