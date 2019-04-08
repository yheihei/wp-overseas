<?php
  /***
   * オススメ記事のスライダー表示
   * */
?>

<div id="featured-slider-container">
  <ul id="feature-slider">
    <?php
      ////////////////////////////
      //おすすめ記事取得処理
      ////////////////////////////
      $define_recommend_tag_names = array(
        'おすすめ',
        'オススメ',
        'お勧め',
        'recommendation',
      );
      
      $tags = get_tags();
      $recommend_tag_ids = array();
      $recommend_slugs = array();
      
      foreach ( $tags as $tag ) {
        if (in_array($tag->name, $define_recommend_tag_names)) {
          // おすすめタグであった場合、tag_idを保存
          $recommend_tag_ids[] = $tag->term_id;
          $recommend_slugs[] = $tag->slug;
        }
      }
      // var_dump($recommend_tag_ids);
      
      $args = array(
          'tag__in' => $recommend_tag_ids, //おすすめタグのidを含む記事を表示
          // 'tag_slug__in' => $recommend_slugs,
          'posts_per_page' => 4, //表示する件数
          'orderby' => 'date',
      );
      $query = new WP_Query( $args );
      $count = 0;
    ?>
    <?php while ($query->have_posts()): $query->the_post(); ?>
    <li>
      <div class="post-thumbnail" ontouchstart="">
      
      <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>">
        <div class="featured-post-item-inner">
          <p class="post-item-title"> <?php echo wp_trim_words( get_the_title(), 16, '...' ); ?> </p>
          <span class="post-item-date"><i class="fa fa-clock-o"></i><?php echo get_post_time('Y-m-d(D)'); ?></span> </div>
        <?php if ( has_post_thumbnail() ): ?>
          <?php the_post_thumbnail('450_square'); ?>
          <?php //the_post_thumbnail('750_square'); ?>
        <?php else: ?>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/no-image-450x450.png" alt="<?php esc_attr( the_title() ); ?>" />
        <?php endif; ?>
      </a>
      <!-- スマホ表示のみタイトルを帯表示  -->
      <div class="sp-slick-title-area">
        <p class="sp-slick-title">
          <a href="<?php the_permalink(); ?>" title="<?php esc_attr( the_title() ); ?>">
            <?php echo wp_trim_words( get_the_title(), 38, '...' ); ?>
          </a>
        </p>
      </div>
      </div>
      <!--/.post-thumbnail-->
      
    </li>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </ul>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/slick.min.js?ver=4.3.1'></script> 
<script>
jQuery(document).ready(function($) {

$('#feature-slider').slick({
  dots: false,
  autoplay: false,
infinite: true,
  autoplaySpeed: 3000,
 speed:  800, 
 arrows:  true, 
slidesToShow: 4,
  slidesToScroll: 1,

  draggable: true,
 responsive: [
  {
     breakpoint: 1200,
      settings: {
		  centerMode: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,  draggable: true,

      }
    },
 {
     breakpoint: 1024,
      settings: {
		  centerMode: false,
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true,  draggable: true,

      }
    },
    {
      breakpoint: 640,
      settings: {
		     centerMode: false,
        slidesToShow: 1,
        slidesToScroll: 1,
		variableWidth: false,  draggable: true,
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]  
  
});



});
</script>


