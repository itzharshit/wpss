<?php 
if ( ! function_exists( 'the_writers_blog_related_posts_function' ) ) {
	function the_writers_blog_related_posts_function() {
		wp_reset_postdata();
		global $post;

		// Define shared post arguments
		$args = array(
			'no_found_rows'          => true,
			'update_post_meta_cache' => false,
			'update_post_term_cache' => false,
			'ignore_sticky_posts'    => 1,
			'orderby'                => 'rand',
			'post__not_in'           => array( $post->ID ),
			'posts_per_page'    => absint( get_theme_mod( 'the_writers_blog_change_related_posts_number', '3' ) ),
		);
		// Related by categories
		if ( get_theme_mod( 'the_writers_blog_show_related_post', 'categories' ) == 'categories' ) {

			$cats = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $cats ) {
				$cats                 = wp_get_post_categories( $post->ID, array( 'fields' => 'ids' ) );
				$args['category__in'] = $cats;
			} else {
				$args['cat'] = $cats;
			}
		}
		// Related by tags
		if ( get_theme_mod( 'the_writers_blog_show_related_post', 'categories' ) == 'tags' ) {

			$tags = get_post_meta( $post->ID, 'related-posts', true );

			if ( ! $tags ) {
				$tags            = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
				$args['tag__in'] = $tags;
			} else {
				$args['tag_slug__in'] = explode( ',', $tags );
			}
			if ( ! $tags ) {
				$break = true;
			}
		}

		$query = ! isset( $break ) ? new WP_Query( $args ) : new WP_Query();

		return $query;
	}
}

$related_posts = the_writers_blog_related_posts_function(); ?>

<?php if ( $related_posts->have_posts() ): ?>

	<div class="related-posts clearfix">
		<?php if ( get_theme_mod('the_writers_blog_change_related_post_title','Related Posts') != '' ) {?>
			<h2 class="related-posts-main-title"><?php echo esc_html( get_theme_mod('the_writers_blog_change_related_post_title',__('Related Posts','the-writers-blog')) ); ?></h2>
		<?php }?>
		<div class="row">
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
				<div class="col-lg-4 col-md-4">
					<article class="page-box">
						<h3><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>" class="text-capitalize"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
						<div class="post-image">
						    <?php 
							    if(has_post_thumbnail()) { 
							        the_post_thumbnail(); 
							    }
						    ?>
					 	</div>
						<?php if(get_the_excerpt()) { ?>
					  		<div class="text"><p><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_related_post_excerpt_number','25')))); ?> <?php echo esc_html( get_theme_mod('the_writers_blog_post_excerpt_suffix','{...}') ); ?></p></div>
						<?php } ?>
					 	<?php if( get_theme_mod('the_writers_blog_button_text','VIEW POST') != ''){ ?>
					  		<a class="post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?></span></a>
					  	<?php }?>
					</article>
				</div> 
			<?php endwhile; ?>
		</div>
	</div><!--/.post-related-->
<?php endif; ?>
<?php wp_reset_postdata(); ?>