<?php //カテゴリー用の内容
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
//カテゴリIDの取得
$cat_id = get_query_var('cat');
if ($cat_id && get_category_meta($cat_id)): ?>
<article class="category-content article">
  <?php //カテゴリタイトル
  get_template_part('tmp/list-title'); ?>
  <?php if ($eye_catch = get_category_eye_catch($cat_id)): ?>
    <header class="article-header category-header">
      <figure class="eye-catch">
        <img src="<?php echo $eye_catch; ?>" alt="<?php echo get_category_title($cat_id); ?>">
        <?php echo '<span class="cat-label cat-label-'.$cat_id.'">'.single_cat_title( '', false ).'</span>'; //カテゴリラベル ?>
      </figure>
    </header>
  <?php endif ?>
  <?php //SNSシェアボタン
    if (is_sns_top_share_buttons_visible())
      get_template_part_with_option('tmp/sns-share-buttons', SS_TOP); ?>
  <?php if ($content = get_category_content($cat_id)): ?>
    <div class="category-page-content entry-content">
      <?php echo $content; ?>
    </div>
    <?php //SNSシェアボタン
    if (is_sns_bottom_share_buttons_visible())
      get_template_part_with_option('tmp/sns-share-buttons', SS_BOTTOM); ?>
  <?php endif ?>
</article>
<?php else: ?>
  <?php //カテゴリタイトル
  get_template_part('tmp/list-title'); ?>
<?php endif ?>