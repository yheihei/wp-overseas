<?php

/***
 * 記事投稿画面のBootstrapコンポーネント タグ
 * ビジュアルエディターのタグ欄にデフォルトの「2カラム」「3カラム」を改造した下記を追加する。
 * ・2カラム固定・3カラム固定
 *この領域が選択された場合、カラムで本文を記載でき、スマホ表示時も2カラム、3カラムを維持して表示する。
 * 
 * */
function generate_html_tags_is($value){
  echo '<script type="text/javascript">
  var htmlTagsTitle = "'.__( 'タグ', THEME_NAME ).'";
  var htmlTagsEmptyText = "'.__( '内容を入力してください。', THEME_NAME ).'";
  var htmlTags = new Array();';
  $left_msg = __( '左側に入力する内容', THEME_NAME );
  $center_msg = __( '中央に入力する内容', THEME_NAME );
  $right_msg = __( '右側に入力する内容', THEME_NAME );
  $keyword_msg = __( 'キーワード', THEME_NAME );
   ?>;

  <?php //２カラムレイアウト
  $before = '<div class="column-wrap column-2"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
   ?>
  htmlTags[0] = new Array();
  htmlTags[0].title  = '<?php echo __( '2カラム（1:1, ｜□｜□｜）', THEME_NAME ); ?>';
  htmlTags[0].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[0].before = '<?php echo $before; ?>';
  htmlTags[0].after = '<?php echo $after; ?>';

  <?php //２カラムレイアウト（1:2）
  $before = '<div class="column-wrap column-2 column-2-3-1-2"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
  ?>
  htmlTags[1] = new Array();
  htmlTags[1].title  = '<?php echo __( '2カラム（1:2, ｜□｜□□｜）', THEME_NAME ); ?>';
  htmlTags[1].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[1].before = '<?php echo $before; ?>';
  htmlTags[1].after = '<?php echo $after; ?>';

  <?php //２カラムレイアウト（2:1）
  $before = '<div class="column-wrap column-2 column-2-3-2-1"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
  ?>
  htmlTags[2] = new Array();
  htmlTags[2].title  = '<?php echo __( '2カラム（2:1, ｜□□｜□｜）', THEME_NAME ); ?>';
  htmlTags[2].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[2].before = '<?php echo $before; ?>';
  htmlTags[2].after = '<?php echo $after; ?>';

  <?php //２カラムレイアウト（1:3）
  $before = '<div class="column-wrap column-2 column-2-4-1-3"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
  ?>
  htmlTags[3] = new Array();
  htmlTags[3].title  = '<?php echo __( '2カラム（1:3, ｜□｜□□□｜）', THEME_NAME ); ?>';
  htmlTags[3].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[3].before = '<?php echo $before; ?>';
  htmlTags[3].after = '<?php echo $after; ?>';

  <?php //２カラムレイアウト（3:1）
  $before = '<div class="column-wrap column-2 column-2-4-3-1"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
  ?>
  htmlTags[4] = new Array();
  htmlTags[4].title  = '<?php echo __( '2カラム（3:1, ｜□□□｜□｜）', THEME_NAME ); ?>';
  htmlTags[4].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[4].before = '<?php echo $before; ?>';
  htmlTags[4].after = '<?php echo $after; ?>';

  <?php //3カラムレイアウト
  $before = '<div class="column-wrap column-3"><div class="column-left"><p>';
  $after = '</p></div><div class="column-center"><p>'.$center_msg.'</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
   ?>
  htmlTags[5] = new Array();
  htmlTags[5].title  = '<?php echo __( '3カラム', THEME_NAME ); ?>';
  htmlTags[5].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[5].before = '<?php echo $before; ?>';
  htmlTags[5].after = '<?php echo $after; ?>';

  <?php //検索
  $before = '<div class="search-form"><div class="sform">';
  $after = '</div><div class="sbtn">'.__( '検索', THEME_NAME ).'</div></div>';
   ?>
  htmlTags[6] = new Array();
  htmlTags[6].title  = '<?php echo __( '検索フォーム風', THEME_NAME ); ?>';
  htmlTags[6].tag = '<?php echo $before.$keyword_msg.$after; ?>';
  htmlTags[6].before = '<?php echo $before; ?>';
  htmlTags[6].after = '<?php echo $after; ?>';
  
  <?php //２カラム固定レイアウト
  $before = '<div class="column-wrap column-2 fix-size"><div class="column-left"><p>';
  $after = '</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
   ?>
  htmlTags[7] = new Array();
  htmlTags[7].title  = '<?php echo __( '2カラム固定', THEME_NAME ); ?>';
  htmlTags[7].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[7].before = '<?php echo $before; ?>';
  htmlTags[7].after = '<?php echo $after; ?>';
  
  <?php //3カラム固定レイアウト
  $before = '<div class="column-wrap column-3 fix-size"><div class="column-left"><p>';
  $after = '</p></div><div class="column-center"><p>'.$center_msg.'</p></div><div class="column-right"><p>'.$right_msg.'</p></div></div>';
   ?>
  htmlTags[8] = new Array();
  htmlTags[8].title  = '<?php echo __( '3カラム固定', THEME_NAME ); ?>';
  htmlTags[8].tag = '<?php echo $before.$left_msg.$after; ?>';
  htmlTags[8].before = '<?php echo $before; ?>';
  htmlTags[8].after = '<?php echo $after; ?>';

  <?php

  echo '</script>';
}