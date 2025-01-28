<?php
/**
 * Displays footer site info
 */

?>
<?php if( get_theme_mod( 'the_writers_blog_hide_show_scroll',true) != '' || get_theme_mod( 'the_writers_blog_enable_disable_scrolltop',true) != '') { ?>
    <?php $the_writers_blog_theme_lay = get_theme_mod( 'the_writers_blog_footer_options','Right');
        if($the_writers_blog_theme_lay == 'Left align'){ ?>
            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'the-writers-blog' ); ?></span></a>
        <?php }else if($the_writers_blog_theme_lay == 'Center align'){ ?>
            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'the-writers-blog' ); ?></span></a>
        <?php }else{ ?>
            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_scroll_icon_changer','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'the-writers-blog' ); ?></span></a>
    <?php }?>
<?php }?>
<div class="site-info">
  <div class="container">  
    <div class="row">
	<div class="col-lg-4 col-md-12 col-12 align-self-center"><?php the_writers_blog_credit(); ?> <?php echo esc_html(get_theme_mod('the_writers_blog_footer_text',__('By ThemesEye','the-writers-blog'))); ?> </div>
    <div class="col-lg-4 col-md-12 col-12 align-self-center">
    <?php if (get_theme_mod('the_writers_blog_show_footer_social_icon', true)){ ?>  
     <div class="socialicons">                             
        <?php if( get_theme_mod( 'the_writers_blog_footer_facebook_url') != '') { ?>
			<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_footer_facebook_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_footer_facebook_icon','fab fa-facebook-f')); ?> py-3 px-2" aria-hidden="true"></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','the-writers-blog' );?></span></a>
		<?php } ?>
		<?php if( get_theme_mod( 'the_writers_blog_footer_twitter_url') != '') { ?>
			<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_footer_twitter_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_footer_twitter_icon','fab fa-twitter')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','the-writers-blog' );?></span></a>
		<?php } ?>
		<?php if( get_theme_mod( 'the_writers_blog_footer_youtube_url') != '') { ?>
			<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_footer_youtube_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_footer_youtube_icon','fab fa-youtube')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','the-writers-blog' );?></span></a>
		<?php } ?>	
		<?php if( get_theme_mod( 'the_writers_blog_footer_linkedin_url') != '') { ?>
		    <a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_footer_linkedin_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_footer_linkedin_icon','fab fa-linkedin-in')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Linkedin','the-writers-blog' );?></span></a>
		<?php } ?>
		<?php if( get_theme_mod( 'the_writers_blog_footer_instagram_url') != '') { ?>
			<a href="<?php echo esc_url( get_theme_mod( 'the_writers_blog_footer_instagram_url','' ) ); ?>" target="_blank"><i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_footer_instagram_icon','fab fa-instagram')); ?> py-3 px-2"></i><span class="screen-reader-text"><?php esc_html_e( 'Instagram','the-writers-blog' );?></span></a>
		<?php } ?>	
     </div>	
    <?php }?>
    </div>
    <div class="footer_text col-lg-4 col-md-12 col-12 align-self-center"><?php echo esc_html_e('Powered By WordPress','the-writers-blog') ?></div>
  </div>
 </div>
</div>