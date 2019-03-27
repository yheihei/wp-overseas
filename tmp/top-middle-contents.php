  <?php
  $query = new WP_Query( 'pagename=top-middle-contents' );
  // $args = array(
  // 'page_id' => 53,
  // );
  // $query = new WP_Query( $args );
  if ($query->have_posts()) : // WordPress ループ
    while ($query->have_posts()) : $query->the_post(); // 繰り返し処理開始
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(array('article', 'top-middle-contents')) ?> itemscope="itemscope" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
      <header class="article-header entry-header">
        <!--<h2 class="entry-title" itemprop="headline"><?php the_title() ?></h2>-->
      
        <?php
        if (is_eyecatch_visible()) {
          get_template_part('tmp/eye-catch');//アイキャッチ挿入
        } ?>
      
      </header>
      <div class="entry-content cf<?php echo get_additional_entry_content_classes(); ?>" itemprop="mainEntityOfPage">
      <?php //記事本文の表示
        the_content(); ?>
      </div>
    </article>
    <?php endwhile; ?>
  <?php endif; ?>