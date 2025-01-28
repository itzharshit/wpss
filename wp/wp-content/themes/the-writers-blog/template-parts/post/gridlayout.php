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
<div class="col-lg-4 col-md-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blogger layout">
			<div class="category">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></a>
			</div>
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
			<div class="post-image">
			    <?php 
				    if(has_post_thumbnail()) { 
				        the_post_thumbnail(); 
				    }
			    ?>
		 	</div>
			<div class="text"><p><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_excerpt_number','25')))); ?> <?php echo esc_html( get_theme_mod('the_writers_blog_post_excerpt_suffix','{...}') ); ?></p></div>
		 	<?php if( get_theme_mod('the_writers_blog_button_text','VIEW POST') != ''){ ?>
		  		<a class="post-link" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_button_text','VIEW POST'));?></span></a>
		  	<?php }?>
		</div>
	</article>
</div>