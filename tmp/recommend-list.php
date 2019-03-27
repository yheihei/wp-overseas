<?php
////////////////////////////
//おすすめ記事取得処理
////////////////////////////
$define_recommend_tag_names = array(
  'ピックアップ',
);

$tags = get_tags();
$recommend_tag_ids = array();

// var_dump($tags);

foreach ( $tags as $tag ) {
  if (in_array($tag->name, $define_recommend_tag_names)) {
    // おすすめタグであった場合、tag_idを保存
    $recommend_tag_ids[] = $tag->term_id;
  }
}

if(empty($recommend_tag_ids)) {
  // おすすめタグが設定されていない場合終わり
  return;
}

$args = array(
    'tag__in' => $recommend_tag_ids, //おすすめタグのidを含む記事を表示
    'posts_per_page' => 3, //表示する件数
    'orderby' => 'date',
);
$query = new WP_Query( $args );
$count = 0;
if ($query->have_posts()) : // WordPress ループ ?>
<p class="section_title">RECOMMEND</p>
<div id="list" class="list<?php echo get_additional_entry_card_classes(); ?>">
  <?php
  while ($query->have_posts()) : $query->the_post(); // 繰り返し処理開始
    $count++;
    get_template_part('tmp/entry-card-recommend');
    
  endwhile; // 繰り返し処理終了 ?>
  <div class="clear"></div>
</div><!-- .list -->
<?php
endif;
wp_reset_postdata();
?>