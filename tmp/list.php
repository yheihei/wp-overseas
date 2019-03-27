<?php //インデックス一覧
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */ ?>

<?php
////////////////////////////
//アーカイブのタイトル
////////////////////////////
if ( is_category() && !is_paged() ){
  ////////////////////////////
  //カテゴリページのコンテンツ
  ////////////////////////////
  get_template_part('tmp/category-content');
} elseif (!is_home()) {
  //それ以外
  get_template_part('tmp/list-title');
}

////////////////////////////
//インデクストップ広告
////////////////////////////
if (is_ad_pos_index_top_visible() && is_all_adsenses_visible()){
  //レスポンシブ広告
  get_template_part_with_ad_format(get_ad_pos_index_top_format(), 'ad-index-top', is_ad_pos_index_top_label_visible());
};

////////////////////////////
//インデックスリストトップウィジェット
////////////////////////////
if ( is_active_sidebar( 'index-top' ) ){
  dynamic_sidebar( 'index-top' );
}; ?>

<?php
////////////////////////////
//レコメンド一覧のコンテンツ
////////////////////////////
if ( is_home() && is_recommend_area_enable() ) :?>
  <?php get_template_part('tmp/recommend-list'); ?>
<?php endif; ?>

<?php 
////////////////////////////
//おすすめと新着リストの間のコンテンツ用ウィジェット
////////////////////////////
if ( is_home() && is_active_sidebar( 'index-between_new' )  && (get_page_number() === 1) ){
  dynamic_sidebar( 'index-between_new' );
};

?>

<?php if ( is_home() ) :?>
<p class="section_title">NEW TOPICS</p>
<?php endif; ?>

<div id="list" class="list<?php echo get_additional_entry_card_classes(); ?>">
<?php
////////////////////////////
//一覧の繰り返し処理
////////////////////////////
$count = 0;
if (have_posts()) : // WordPress ループ
  while (have_posts()) : the_post(); // 繰り返し処理開始
    $count++;
    set_query_var( 'count', $count );
    get_template_part('tmp/entry-card');

    //インデックスミドルに広告を表示してよいかの判別
    if (is_ad_pos_index_middle_visible() && is_index_middle_ad_visible($count) && is_all_adsenses_visible()) {
      get_template_part_with_ad_format(get_ad_pos_index_middle_format(), 'ad-index-middle', is_ad_pos_index_middle_label_visible());
    }

    ////////////////////////////
    //インデックスリストミドルウィジェット
    ////////////////////////////
    if ( is_active_sidebar( 'index-middle' ) && is_index_middle_widget_visible($count) ){
      dynamic_sidebar( 'index-middle' );
    };

  endwhile; // 繰り返し処理終了 ?>
<?php else : // ここから記事が見つからなかった場合の処理
  get_template_part('tmp/list-not-found-posts');
endif;
?>
</div><!-- .list -->

<?php
////////////////////////////
//インデクスボトム広告
////////////////////////////
if (is_ad_pos_index_bottom_visible() && is_all_adsenses_visible()){
  //レスポンシブ広告のフォーマットにrectangleを指定する
  get_template_part_with_ad_format(get_ad_pos_index_bottom_format(), 'ad-index-bottom', is_ad_pos_index_bottom_label_visible());
}; ?>

<?php
////////////////////////////
//インデックスリストボトムウィジェット
////////////////////////////
if ( is_active_sidebar( 'index-bottom' ) ){
  dynamic_sidebar( 'index-bottom' );
}; ?>

<?php
////////////////////////////
//ページネーション
////////////////////////////
get_template_part('tmp/pagination'); ?>

<?php
////////////////////////////
//新着記事とカテゴリ記事一覧の間コンテンツ
////////////////////////////
if ( is_home()  && (get_page_number() === 1) ) :
  get_template_part('tmp/top-middle-contents');
endif; ?>

<?php
/*
/*特定カテゴリー一覧表示機能
/*/
if ( is_home() ) :
  get_template_part('tmp/category-list');
endif; ?>

<?php
////////////////////////////
//メインカラム追従領域
////////////////////////////
get_template_part('tmp/main-scroll'); ?>