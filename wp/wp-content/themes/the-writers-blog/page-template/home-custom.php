<?php
/**
 * Template Name: Home Custom Page
 */
get_header(); ?>

<main id="main" role="main">
  <?php do_action( 'the_writers_blog_before_slider' ); ?>

  <?php if( get_theme_mod('the_writers_blog_slider_arrows', false) != '' || get_theme_mod('the_writers_blog_enable_disable_slider', true) != ''){ ?>
    <div class="<?php if( get_theme_mod('the_writers_blog_slider_width_options', 'Full Width') == 'Container Width'){ ?>container <?php }?>">
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-interval="<?php echo esc_attr(get_theme_mod('the_writers_blog_slider_speed', 3000)); ?>"> 
        <?php $the_writers_blog_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'the_writers_blog_slide_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $the_writers_blog_slider_pages[] = $mod;
            }
          }
          if( !empty($the_writers_blog_slider_pages) ) :
          $args = array(
            'post_type' => 'post',
            'post__in' => $the_writers_blog_slider_pages,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
          <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
            <?php the_post_thumbnail(); ?>
            <div class="carousel-caption">
              <div class="inner_carousel">
                <?php if( get_theme_mod('the_writers_blog_slider_category',true) != ''){ ?>
                  <div  class="cats">
                    <p class="mb-0 text-uppercase"><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?></p>
                  </div>
                <?php } ?>
                <?php if( get_theme_mod('the_writers_blog_slider_title',true) != ''){ ?>
                  <h1 class="text-capitalize"><?php the_title();?></h1>
                <?php } ?>
                <?php if( get_theme_mod('the_writers_blog_slider_metabox',true) != ''){ ?>
                  <div class="post-info text-center py-1 mb-2">
                    <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_date_icon_changer','fa fa-calendar')); ?> me-1" aria-hidden="true"></i><span class="entry-date me-2"> <?php echo esc_html(get_the_date()); ?></span>
                    <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_author_icon_changer','fa fa-user')); ?> me-1" aria-hidden="true"></i><span class="entry-author me-2"> <?php the_author(); ?></span>
                    <i class="<?php echo esc_attr(get_theme_mod('the_writers_blog_post_comment_icon_changer','fas fa-comments')); ?> me-1"></i><span class="entry-comments me-2"><?php comments_number( __('0 Comments','the-writers-blog'), __('0 Comments','the-writers-blog'), __('% Comments','the-writers-blog') ); ?></span>
                  </div>
                <?php } ?>
                <?php if( get_theme_mod('the_writers_blog_slider_content',true) != ''){ ?>
                  <p class="slider-content"><?php $the_writers_blog_excerpt = get_the_excerpt(); echo esc_html( the_writers_blog_string_limit_words( $the_writers_blog_excerpt, esc_attr(get_theme_mod('the_writers_blog_slider_excerpt_number','20')))); ?></p>
                <?php } ?>
                <?php if( get_theme_mod('the_writers_blog_slider_button',true) == true || get_theme_mod('the_writers_blog_show_hide_slider_button',true) == true){ ?>
                  <?php if( get_theme_mod('the_writers_blog_slider_button_text','VIEW POST') != ''){ ?>
                    <div class ="readbutton">
                      <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('the_writers_blog_slider_button_text','VIEW POST'));?><i class="fas fa-angle-double-right p-2"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('the_writers_blog_slider_button_text','VIEW POST'));?></span></a>
                    </div>
                  <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
        <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-double-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','the-writers-blog' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-double-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','the-writers-blog' );?></span>
        </a>
      </div> 
      <div class="clearfix"></div>
    </section>    
  <?php }?> 

  <?php do_action( 'the_writers_blog_after_slider' ); ?>

  <div id="home-content" class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9">
        <?php if(get_theme_mod('the_writers_blog_category_section') != ''){ ?>
          <section id="blog-category">
            <?php 
            $the_writers_blog_catData = get_theme_mod('the_writers_blog_category_section');
              if($the_writers_blog_catData){              
                $page_query = new WP_Query(array( 'category_name' => esc_html( $the_writers_blog_catData ,'the-writers-blog')));?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); 
                  get_template_part( 'template-parts/post/content' );
                endwhile;
                wp_reset_postdata();
              }
            ?>
            <div class="clearfix"></div>
          </section>
        <?php }?>

        <?php do_action( 'the_writers_blog_after_blog_category' ); ?>

        <div class="text">
          <?php while ( have_posts() ) : the_post();?>
            <?php the_content(); ?>
          <?php endwhile; // End of the loop. ?>
        </div>
        <?php wp_reset_postdata(); ?>

      </div>
      <div id="sidebox" class="col-lg-3 col-md-3">
        <?php dynamic_sidebar( 'homepage-sidebar' ); ?>
      </div>
    </div>
  </div>
</main>

<?php get_footer(); ?>