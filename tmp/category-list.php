<?php
////////////////////////////
//特定カテゴリー一覧取得処理処理
////////////////////////////
if (!function_exists('types_render_termmeta')) {
  return;
}

// 新着に表示されている記事を取得
$newPosts = array();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; // 現在のページ数
$newArgs = array(
  'orderby' => 'date',
  'paged' => $paged,
);
$query = new WP_Query( $newArgs );
if ($query->have_posts()) : // WordPress ループ 
  while ($query->have_posts()) : $query->the_post(); // 繰り返し処理開始
    $newPosts[] = get_the_ID();
  endwhile; // 繰り返し処理終了
endif;
wp_reset_postdata();

// カテゴリーを優先度順に取得する
$args = array(
  'orderby' => 'meta_value_num', // term_metaの値で
	'order' => 'DESC', // 降順(値の大きい順)で並べる
	'meta_query' => [[
    'key' => 'yhei_category_weight', // 優先度を
    'type' => 'NUMERIC', // 数値で
  ]],
  'exclude' => '1' // 「未設定」カテゴリを除外
);
$categories = get_categories($args);
$category_list_count = 1;
foreach($categories as $category):
$category_id = get_cat_ID( $category->name );
if(types_render_termmeta("kkb_is_shown_top", array( "term_id" => $category_id ) )) :?>
  <p class="section_title"><?php echo $category->name; ?></p>
  <?php
  ////////////////////////////
  //トップカテゴリー間コンテンツウィジェット
  ////////////////////////////
  if ( is_active_sidebar( 'index-between_cat' . (string) ($category_list_count) )  && (get_page_number() === 1) ) {
  dynamic_sidebar( 'index-between_cat' . (string) ($category_list_count) );
  };
  if ( is_active_sidebar( 'index-between_cat' . (string) ($category_list_count) . '-no-style' )  && (get_page_number() === 1) ){
  dynamic_sidebar( 'index-between_cat' . (string) ($category_list_count) . '-no-style' );
  };
  ?>
  <div id="list" class="list<?php echo get_additional_category_entry_card_classes(); ?>">
  <?php 
  // $category_count = types_render_termmeta("kkb_is_shown_top_count", array( "term_id" => $category_id ) );
  $args_category = array(
    'cat' => $category_id,
    'orderby' => 'date',
    // 'posts_per_page' => $category_count,
    'post__not_in' => $newPosts, // 新着に表示されているものは除外
  );
  $category_count = get_category_entry_count();
  if(!empty($category_count)) {
    $args_category['posts_per_page'] = $category_count;
  }
  $query = new WP_Query( $args_category );
  $count = 0;
  if ($query->have_posts()) : // WordPress ループ
    while ($query->have_posts()) : $query->the_post(); // 繰り返し処理開始
      $count++;
      get_template_part('tmp/entry-card');
      
    endwhile; // 繰り返し処理終了 ?>
    <div class="clear"></div>
  <?php else : // ここから記事が見つからなかった場合の処理  ?>
    <div class="post">
      <p><?php echo __( '投稿が見つかりませんでした。', THEME_NAME );//見つからない時のメッセージ ?></p>
    </div>
  <?php
  endif;
  wp_reset_postdata();
  ?>
  </div><!-- .list -->
<?php
endif;
?>
<?php
$category_list_count++;
endforeach; ?>