<?php
/**
 * Template part for displaying posts
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="blogger">
		<?php $the_writers_blog_blog_layout = get_theme_mod( 'the_writers_blog_blog_post_layout','Default');
	    if($the_writers_blog_blog_layout == 'Default'){ ?>
			<div class="row m-0">
		        <div class="col-lg-5 col-md-5 pe-0">
					<?php if(has_post_thumbnail()) { ?>
						<?php the_post_thumbnail(); ?>
					<?php } ?>
		        </div>
		        <div class="<?php if(has_post_thumbnail()) { ?>col-lg-7 col-md-7 ps-0"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>">
					<div class="box-content">
						<p class="cat-pst text-uppercase"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></p>
						<h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>" class="text-capitalize"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
						<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '' || get_theme_mod( 'the_writers_blog_comment_hide',true) != '' || get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
							<div class="post-info">
								<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '') { ?>
									<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_date_icon_changer','fa fa-calendar')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
								<?php } ?>
								<?php if( get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
							  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_author_icon_changer','fa fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
								<?php } ?>
								<?php if( get_theme_mod( 'the_writers_blog_comment_hide',true) != '') { ?>
							  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_comment_icon_changer','fas fa-comments')); ?>"></i><span class="entry-comments"><?php comments_number( __('0 Comments','the-writers-blog'), __('0 Comments','the-writers-blog'), __('% Comments','the-writers-blog') ); ?></span>
								<?php } ?>
		            <?php if( get_theme_mod( 'the_writers_blog_post_time',true) != '' ) { ?>
		              <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_time_icon_changer','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
		            <?php }?>
        				<?php echo esc_html (the_writers_blog_edit_link()); ?>
							</div>
						<?php }?>
						<?php if(get_theme_mod('the_writers_blog_blog_description') == 'Post Content'){ ?>
							<div class="text"><?php the_content(); ?></div>
						<?php }
						if(get_theme_mod('the_writers_blog_blog_description', 'Post Excerpt') == 'Post Excerpt'){ ?>
							<?php if(get_the_excerpt()) { ?>
						  		<div class="text"><p><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_excerpt_number','25')))); ?> <?php echo esc_html( get_theme_mod('the_writers_blog_post_excerpt_suffix','{...}') ); ?></p></div>
							<?php } ?>
						<?php }?>
						<div class="row">
							<div class="col-lg-7 col-md-12 main-icons">
								<div class="icons">
					                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','the-writers-blog' );?></span></a>
					                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php  the_permalink(); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','the-writers-blog' );?></span></a>
					                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','the-writers-blog' );?></span></a>
					                <a href="http://www.instagram.com/submit?url=<?php the_permalink(); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','the-writers-blog' );?></span></a>
					            </div>
							</div>
							<div class="col-lg-5 col-md-12">
								<?php if( get_theme_mod('the_writers_blog_button_text','VIEW POST') != ''){ ?>
									<div class ="aboutbtn">
							        	<a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?></span></a>
							        </div>
						        <?php }?>
							</div>
						</div>
					</div>
		        </div>
		    </div>
		<?php }else if($the_writers_blog_blog_layout == 'Center' || $the_writers_blog_blog_layout == 'Left'){ ?>
          	<?php if(has_post_thumbnail()) { ?>
          		<?php the_post_thumbnail(); ?>
        	<?php } ?>
			<div class="box-content">
				<p class="cat-pst"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></p>
				<h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>" class="text-capitalize"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
				<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '' || get_theme_mod( 'the_writers_blog_comment_hide',true) != '' || get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
					<div class="post-info">
						<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '') { ?>
					  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_date_icon_changer','fa fa-calendar')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
						<?php } ?>
						<?php if( get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
					  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_author_icon_changer','fa fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
						<?php } ?>
						<?php if( get_theme_mod( 'the_writers_blog_comment_hide',true) != '') { ?>
					  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_comment_icon_changer','fas fa-comments')); ?>"></i><span class="entry-comments"><?php comments_number( __('0 Comments','the-writers-blog'), __('0 Comments','the-writers-blog'), __('% Comments','the-writers-blog') ); ?></span>
						<?php } ?>
            <?php if( get_theme_mod( 'the_writers_blog_post_time',true) != '' ) { ?>
              <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_time_icon_changer','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
            <?php }?>
					</div>
				<?php }?>
				<?php if(get_theme_mod('the_writers_blog_blog_description') == 'Post Content'){ ?>
					<?php the_content(); ?>
				<?php }
				if(get_theme_mod('the_writers_blog_blog_description', 'Post Excerpt') == 'Post Excerpt'){ ?>
					<?php if(get_the_excerpt()) { ?>
						<div class="text"><p><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_excerpt_number','25')))); ?> <?php echo esc_html( get_theme_mod('the_writers_blog_post_excerpt_suffix','{...}') ); ?></p></div>
					<?php } ?>
				<?php }?>
				<div class="row">
					<div class="<?php if(get_theme_mod('the_writers_blog_button_text','VIEW POST') != '') { ?>col-lg-7 col-md-12 main-icons"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>">
						<div class="icons">
			                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','the-writers-blog' );?></span></a>
			                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php  the_permalink(); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','the-writers-blog' );?></span></a>
			                <a href="https://twitter.com/share?url=<?php  the_permalink(); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','the-writers-blog' );?></span></a>
			                <a href="http://www.instagram.com/submit?url=<?php  the_permalink(); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','the-writers-blog' );?></span></a>
			            </div>
					</div>
					<div class="col-lg-5 col-md-12">
						<?php if( get_theme_mod('the_writers_blog_button_text','VIEW POST') != ''){ ?>
							<div class ="aboutbtn">
			        	<a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?></span></a>
			        </div>
		        <?php }?>
					</div>
				</div>
			</div>
		
		<?php }else if($the_writers_blog_blog_layout == 'Content and Image'){ ?>
      <div class="row m-0"> 
		    <div class="<?php if(has_post_thumbnail()) { ?>col-lg-7 col-md-7 pe-0"<?php } else { ?>col-lg-12 col-md-12"<?php } ?>">
					<div class="box-content">
						<p class="cat-pst text-uppercase"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></p>
						<h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>" class="text-capitalize"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
						<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '' || get_theme_mod( 'the_writers_blog_comment_hide',true) != '' || get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
							<div class="post-info">
								<?php if( get_theme_mod( 'the_writers_blog_date_hide',true) != '') { ?>
									<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_date_icon_changer','fa fa-calendar')); ?>"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
								<?php } ?>
								<?php if( get_theme_mod( 'the_writers_blog_author_hide',true) != '') { ?>
							  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_author_icon_changer','fa fa-user')); ?>"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><?php echo esc_html( get_theme_mod('the_writers_blog_blog_post_metabox_seperator') ); ?>
								<?php } ?>
								<?php if( get_theme_mod( 'the_writers_blog_comment_hide',true) != '') { ?>
							  		<i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_comment_icon_changer','fas fa-comments')); ?>"></i><span class="entry-comments"><?php comments_number( __('0 Comments','the-writers-blog'), __('0 Comments','the-writers-blog'), __('% Comments','the-writers-blog') ); ?></span>
								<?php } ?>
		            <?php if( get_theme_mod( 'the_writers_blog_post_time',true) != '' ) { ?>
		              <span class="entry-time"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_time_icon_changer','fas fa-clock')); ?>"></i> <?php echo esc_html( get_the_time() ); ?></span>
		            <?php }?>
        				<?php echo esc_html (the_writers_blog_edit_link()); ?>
							</div>
						<?php }?>
						<?php if(get_theme_mod('the_writers_blog_blog_description') == 'Post Content'){ ?>
							<div class="text"><?php the_content(); ?></div>
						<?php }
						if(get_theme_mod('the_writers_blog_blog_description', 'Post Excerpt') == 'Post Excerpt'){ ?>
							<?php if(get_the_excerpt()) { ?>
						  		<div class="text"><p><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_excerpt_number','25')))); ?> <?php echo esc_html( get_theme_mod('the_writers_blog_post_excerpt_suffix','{...}') ); ?></p></div>
							<?php } ?>
						<?php }?>
						<div class="row">
							<div class="col-lg-7 col-md-12 main-icons">
								<div class="icons">
		                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','the-writers-blog' );?></span></a>
		                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php  the_permalink(); ?>"><i class="fab fa-linkedin-in" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','the-writers-blog' );?></span></a>
		                <a href="https://twitter.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-twitter" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','the-writers-blog' );?></span></a>
		                <a href="http://www.instagram.com/submit?url=<?php the_permalink(); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','the-writers-blog' );?></span></a>
		            </div>
							</div>
							<div class="col-lg-5 col-md-12">
								<?php if( get_theme_mod('the_writers_blog_button_text','VIEW POST') != ''){ ?>
									<div class ="aboutbtn">
							        	<a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?><i class="fas fa-angle-double-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?></span></a>
							        </div>
						        <?php }?>
							</div>
						</div>
					</div>
		    </div>
				<div class="col-lg-5 col-md-5 ps-0">
					<?php if(has_post_thumbnail()) { ?>
						<?php the_post_thumbnail(); ?>
					<?php } ?>
		    </div>
		  </div>
		<?php } ?>
	</div>
</article>
