<?php
/**
 * The template for displaying archive pages
 */

get_header(); ?>

<main id="main" role="main">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<header role="banner" class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header>
		<?php endif; ?>
		<div class="row">
			<?php
		    $the_writers_blog_layout_setting = get_theme_mod( 'the_writers_blog_layout_settings', __('Right Sidebar','the-writers-blog') );
		    if($the_writers_blog_layout_setting == 'Left Sidebar'){ ?>
			    <div id="sidebox" class="col-lg-4 col-md-4">
					<?php get_sidebar(); ?>
				</div>
				<div class="col-lg-8 col-md-8">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<?php if( get_theme_mod( 'the_writers_blog_show_post_pagination',true) != '') { ?>
						<div class="navigation">
			                <?php the_writers_blog_pagination_type(); ?>
		       	 		</div>
		       	 	<?php } ?>
				</div>
			<?php }else if($the_writers_blog_layout_setting == 'Right Sidebar'){ ?>
				<div class="col-lg-8 col-md-8">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<?php if( get_theme_mod( 'the_writers_blog_show_post_pagination',true) != '') { ?>
						<div class="navigation">
			                <?php the_writers_blog_pagination_type(); ?>
		       	 		</div>
		       	 	<?php } ?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php get_sidebar(); ?>
				</div>
			<?php }else if($the_writers_blog_layout_setting == 'One Column'){ ?>
				<div class="col-lg-12 col-md-12">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<?php if( get_theme_mod( 'the_writers_blog_show_post_pagination',true) != '') { ?>
						<div class="navigation">
			                <?php the_writers_blog_pagination_type(); ?>
		       	 		</div>
		       	 	<?php } ?>
				</div>
			<?php }else if($the_writers_blog_layout_setting == 'Grid Layout'){ ?>
				<div class="col-lg-9 col-md-9">
					<div class="row">
						<?php
							if ( have_posts() ) :

								/* Start the Loop */
								while ( have_posts() ) : the_post();
									
									get_template_part( 'template-parts/post/gridlayout' );

								endwhile;

							else :

								get_template_part( 'template-parts/post/content', 'none' );

							endif;
						?>
						<?php if( get_theme_mod( 'the_writers_blog_show_post_pagination',true) != '') { ?>
							<div class="navigation">
				                <?php the_writers_blog_pagination_type(); ?>
			       	 		</div>
			       	 	<?php } ?>
		       	 	</div>
				</div>
				<div id="sidebox" class="col-lg-3 col-md-3">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			<?php }else {?>
				<div class="col-lg-8 col-md-8">
					<?php
						if ( have_posts() ) :

							/* Start the Loop */
							while ( have_posts() ) : the_post();
								
								get_template_part( 'template-parts/post/content', get_post_format() );

							endwhile;

						else :

							get_template_part( 'template-parts/post/content', 'none' );

						endif;
					?>
					<?php if( get_theme_mod( 'the_writers_blog_show_post_pagination',true) != '') { ?>
						<div class="navigation">
			                <?php the_writers_blog_pagination_type(); ?>
		       	 		</div>
		       	 	<?php } ?>
				</div>
				<div id="sidebox" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-1'); ?>
				</div>
			<?php } ?>
		</div>
	</div>
</main>

<?php get_footer();