<?php //子テーマ用関数

// define('WP_DEBUG', false);

// E_NOTICE 以外の全てのエラーを表示する
error_reporting(E_ALL & ~E_NOTICE);
//テーマ名
define('THEME_NAME', 'cocoon');

//親skins の取得有無の設定
function include_parent_skins(){
  return true; //親skinsを含める場合はtrue、含めない場合はfalse
}

//子テーマ用のビジュアルエディタースタイルを適用
add_editor_style();

//以下にSimplicity子テーマ用の関数を書く

// 記事中でグリッドレイアウトを使うショートコード
// グリッドレイアウトを使用する部分に使う
function owGridFunc( $atts, $content = null ) {
  $content = do_shortcode( shortcode_empty_paragraph_fix( $content ) );
  return '<div class="ow-container">' . $content . '</div>';
}
add_shortcode('ow-grid', 'owGridFunc');
// グリッドレイアウト中の各レイアウトの幅指定。12分割のうちcol分割分の幅を取る
function owGridWidthFunc( $atts, $content = null ) {
  $content = shortcode_empty_paragraph_fix( $content );
  extract( shortcode_atts( array(
      'col' => 'default',
  ), $atts ) );
   
  return '<div class="owcol-' . $col . '">' . $content . '</div>';
}
add_shortcode('ow-col', 'owGridWidthFunc');

/**
* shortcodeがpタグに囲まれるfix
*
*/
function shortcode_empty_paragraph_fix($content) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );
 
    $content = strtr($content, $array);
    return $content;
}


// おすすめと新着リストの間のコンテンツ用ウィジェット
if ( !function_exists( 'register_index_between_new_area' ) ):
function register_index_between_new_area(){
  register_sidebars(1,
    array(
    'name' => __( 'おすすめと新着間コンテンツ', THEME_NAME ),
    'id' => 'index-between_new',
    'description' => __( 'おすすめと新着リストの間に表示されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<aside id="%1$s" class="widget widget-index-top yhei-between-widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_new_area();


// トップのカテゴリー一覧の間コンテンツ1
if ( !function_exists( 'register_index_between_category_area1' ) ):
function register_index_between_category_area1(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ1(記事風スタイル)', THEME_NAME ),
    'id' => 'index-between_cat1',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<article id="%1$s" class="widget widget-index-top yhei-between-widget %2$s"><div class="entry-content">',
    'after_widget' => '</div></article>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area1();

// トップのカテゴリー一覧の間コンテンツ1(スタイルなし)
if ( !function_exists( 'register_index_between_category_area1_no_style' ) ):
function register_index_between_category_area1_no_style(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ1(スタイルなし)', THEME_NAME ),
    'id' => 'index-between_cat1-no-style',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<aside id="%1$s" class="widget widget-index-top yhei-between-widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area1_no_style();

// トップのカテゴリー一覧の間コンテンツ2
if ( !function_exists( 'register_index_between_category_area2' ) ):
function register_index_between_category_area2(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ2(記事風スタイル)', THEME_NAME ),
    'id' => 'index-between_cat2',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<article id="%1$s" class="widget widget-index-top yhei-between-widget %2$s"><div class="entry-content">',
    'after_widget' => '</div></article>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area2();

// トップのカテゴリー一覧の間コンテンツ2(スタイルなし)
if ( !function_exists( 'register_index_between_category_area2_no_style' ) ):
function register_index_between_category_area2_no_style(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ2(スタイルなし)', THEME_NAME ),
    'id' => 'index-between_cat2-no-style',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<aside id="%1$s" class="widget widget-index-top yhei-between-widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area2_no_style();

// トップのカテゴリー一覧の間コンテンツ3
if ( !function_exists( 'register_index_between_category_area3' ) ):
function register_index_between_category_area3(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ3(記事風スタイル)', THEME_NAME ),
    'id' => 'index-between_cat3',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<article id="%1$s" class="widget widget-index-top yhei-between-widget %2$s"><div class="entry-content">',
    'after_widget' => '</div></article>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area3();

// トップのカテゴリー一覧の間コンテンツ3(スタイルなし)
if ( !function_exists( 'register_index_between_category_area3_no_style' ) ):
function register_index_between_category_area3_no_style(){
  register_sidebars(1,
    array(
    'name' => __( 'トップカテゴリー間コンテンツ3(スタイルなし)', THEME_NAME ),
    'id' => 'index-between_cat3-no-style',
    'description' => __( 'カテゴリー一覧の間に挿入されるコンテンツ。設定しないと表示されません。', THEME_NAME ),
    'before_widget' => '<aside id="%1$s" class="widget widget-index-top yhei-between-widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<div class="widget-index-top-title main-widget-label">',
    'after_title' => '</div>',
  ));
}
endif;
register_index_between_category_area3_no_style();

// 現在のページ数取得
function get_page_number() {  
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  
  return $paged;
}

/***
 * カテゴリーリストの設定周り
 * 
 * */
//カテゴリーリストのエントリーカードタイプ
define('OP_CATEGORY_ENTRY_CARD_TYPE', 'category_entry_card_type');
if ( !function_exists( 'get_category_entry_card_type' ) ):
function get_category_entry_card_type(){
  // return get_theme_option(OP_CATEGORY_ENTRY_CARD_TYPE, 'entry_card');
  return get_option(OP_CATEGORY_ENTRY_CARD_TYPE, 'entry_card');
}
endif;
if ( !function_exists( 'is_category_entry_card_type_entry_card' ) ):
function is_category_entry_card_type_entry_card(){
  return get_category_entry_card_type() == 'entry_card';
}
endif;

//カテゴリー一覧のエントリーカードのclass追加関数
if ( !function_exists( 'get_additional_category_entry_card_classes' ) ):
function get_additional_category_entry_card_classes($option = null){

  $classes = null;

  $classes .= ' ect-'.replace_value_to_class(get_category_entry_card_type());
  switch (get_category_entry_card_type()) {
    case 'vertical_card_2':
    case 'vertical_card_3':
    case 'tile_card_2':
    case 'tile_card_3':
      $classes .= ' ect-vertical-card';
      break;
  }
  switch (get_category_entry_card_type()) {
    case 'tile_card_2':
    case 'tile_card_3':
      $classes .= ' ect-tile-card';
      break;
  }
  if (is_entry_card_type_2_columns()) {
    $classes .= ' ect-2-columns';
  }
  if (is_entry_card_type_3_columns()) {
    $classes .= ' ect-3-columns';
  }

  //エントリーカードに枠線を付ける
  if (is_entry_card_border_visible()) {
    $classes .= ' ecb-entry-border';
  }


  //スマートフォンでエントリーカードを1カラムに
  if (!is_entry_card_type_entry_card() && is_smartphone_entry_card_1_column()) {
    $classes .= ' sp-entry-card-1-column';
  }

  if ($option) {
    $classes .= ' '.trim($option);
  }
  return apply_filters('get_additional_category_entry_card_classes', $classes);
}
endif;

// カテゴリリストの数
define('OP_CATEGORY_ENTRY_COUNT', 'category_entry_count');
if ( !function_exists( 'get_category_entry_count' ) ):
function get_category_entry_count(){
  return get_option(OP_CATEGORY_ENTRY_COUNT);
}
endif; 

/***
 * Recommendエリアの設定周り
 * 
 * */
//Recommendエリアの表示非表示
define('OP_IS_RECOMMEND_AREA_ENABLE', 'is_recommend_area_enable');
if ( !function_exists( 'is_recommend_area_enable' ) ):
function is_recommend_area_enable(){
  return get_option(OP_IS_RECOMMEND_AREA_ENABLE, true);
}
endif;

/***
 * TOP Recommendスライダー周り
 * 
 * */
add_image_size('750_square', 750, 750, true);
add_image_size('450_square', 450, 450, true);
//TOP Recommendエリアの表示非表示
define('OP_IS_RECOMMEND_SLIDER_AREA_ENABLE', 'is_recommend_slider_area_enable');
if ( !function_exists( 'is_recommend_slider_area_enable' ) ):
function is_recommend_slider_area_enable(){
  return get_option(OP_IS_RECOMMEND_SLIDER_AREA_ENABLE, true);
}
endif;

/***
 * フッタ サイドバーのホバー色
 * 
 * */
//フッタ サイドバーのホバー色
define('OP_SITE_HOVER_COLOR', 'site_hover_color');
if ( !function_exists( 'get_site_hover_color' ) ):
function get_site_hover_color(){
  return get_option(OP_SITE_HOVER_COLOR);
}
endif; 

/***
 * Footerの色周り
 * 
 * */
//サイトフッタ背景色
define('OP_SITE_FOOTER_BACKGROUND_COLOR', 'site_footer_background_color');
if ( !function_exists( 'get_site_footer_background_color' ) ):
function get_site_footer_background_color(){
  return get_option(OP_SITE_FOOTER_BACKGROUND_COLOR);
}
endif; 

require_once('settings/child-settings.php');

/***
 * 記事投稿画面のBootstrapコンポーネント タグ
 * ビジュアルエディターのタグ欄にデフォルトの「2カラム」「3カラム」を改造した下記を追加する。
 * ・2カラム固定・3カラム固定
 *この領域が選択された場合、カラムで本文を記載でき、スマホ表示時も2カラム、3カラムを維持して表示する。
 * 
 ***/
require_once('lib/tinymce/html-tags.php');

function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_stylesheet_directory_uri() . '/css/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

//エントリーカード抜粋文の最大文字数を超えたときの文字列を削除
define('OP_ENTRY_CARD_EXCERPT_MORE', 'entry_card_excerpt_more');
if ( !function_exists( 'get_entry_card_excerpt_more' ) ):
function get_entry_card_excerpt_more(){
  // return get_theme_option(OP_ENTRY_CARD_EXCERPT_MORE, __( '...', THEME_NAME ));
  return "";
}
endif;

/**
 * カテゴリーページの記事数設定追加
 * */
add_action ('category_add_form_fields', 'yhei_extra_category_fields' );
add_action ( 'edit_category_form_fields', 'yhei_extra_category_fields');
function yhei_extra_category_fields( $tag ) {
    $t_id = $tag->term_id;
    // 値があればvalueに入れるのでtermmetaを取得
    $cat_meta = get_term_meta($t_id);
?>
<tr class="form-field">
    <th><label for="yhei_post_count_in_category">カテゴリーページの記事数(子テーマ設定)</label></th>
    <td><input type="text" name="Cat_meta[yhei_post_count_in_category]" id="extra_text" size="25" value="<?php if(isset ( $cat_meta['yhei_post_count_in_category'])) echo esc_html($cat_meta['yhei_post_count_in_category'][0]) ?>" /></td>
</tr>
<?php
}
add_action ( 'edited_term', 'yhei_save_extra_category_fileds');
function yhei_save_extra_category_fileds( $term_id ) {
  if ( isset( $_POST['Cat_meta'] ) ) {
     $t_id = $term_id;
     $cat_keys = array_keys($_POST['Cat_meta']);
        foreach ($cat_keys as $key){
        if (isset($_POST['Cat_meta'][$key])){
           update_term_meta($t_id, $key, $_POST['Cat_meta'][$key]);
        }
     }
  }
}
/**
 * カテゴリーページの記事数設定取得
 * */
function get_post_count_in_category($term_id) {
  $cat_data = get_term_meta($term_id);
  if( !isset($cat_data['yhei_post_count_in_category'][0]) ) {
    return 0;
  }
  
  $post_count_in_category = $cat_data['yhei_post_count_in_category'][0];
  if( empty($post_count_in_category) ) {
    return 0;
  }
  
  if( !is_numeric($post_count_in_category) ) {
    return 0;
  }
  
  return intval($post_count_in_category);
}
/**
 * カテゴリーページの場合メインクエリのページ数を変更
 * */
function myCategoryPosts( $query ) {
  if ( is_admin() || ! $query->is_main_query() ){
      return;
  }
  if ( $query->is_category() ) {
    // $term_id = get_query_var('cat');
    $term_id = get_queried_object_id();
    $post_count_in_category = get_post_count_in_category($term_id);
    if ( !empty($post_count_in_category) ) {
      $query->set('posts_per_page', intval($post_count_in_category) );
    }
  }
}
add_action('pre_get_posts','myCategoryPosts');

/**
 * トップページのカテゴリーの優先度設定
 * */
add_action ('category_add_form_fields', 'yhei_weight_category_fields' );
add_action ( 'edit_category_form_fields', 'yhei_weight_category_fields');
function yhei_weight_category_fields( $tag ) {
    $t_id = $tag->term_id;
    // 値があればvalueに入れるのでtermmetaを取得
    $cat_meta = get_term_meta($t_id);
?>
<tr class="form-field">
    <th><label for="yhei_category_weight">トップページでの優先度。値が大きいほど最初に表示(子テーマ設定)</label></th>
    <td><input type="text" name="Cat_meta[yhei_category_weight]" id="extra_text" size="25" value="<?php if(isset ( $cat_meta['yhei_category_weight'])) echo esc_html($cat_meta['yhei_category_weight'][0]) ?>" /></td>
</tr>
<?php
}
/**
 * トップページに表示するカテゴリーの優先度取得
 * */
function get_category_weight_in_top($term_id) {
  $cat_data = get_term_meta($term_id);
  if( !isset($cat_data['yhei_category_weight'][0]) ) {
    return 0;
  }
  
  $category_weight = $cat_data['yhei_category_weight'][0];
  if( empty($category_weight) ) {
    return 0;
  }
  
  if( !is_numeric($category_weight) ) {
    return 0;
  }
  
  return intval($category_weight);
}

// タグクラウドを使われている順に、表示数を制限
function custom_wp_tag_cloud($args) {
 $myargs = array(
 'orderby' => 'count', //使用頻度順
 'order' => 'DESC', // 降順（使用頻���の高い順）
 'number' => 20 // 表示数
 );
 $args = wp_parse_args($args, $myargs);
 return $args;
}
add_filter( 'widget_tag_cloud_args', 'custom_wp_tag_cloud' );

/**
 * カスタムパーマリンクプラグインを使用していると、内部ブログカードが作成できない
 * lib/blogcard-in.php の該当部分を上書きカスタマイズ
 **/
function get_post_id_custom_permalink( $url ) {
  // カスタムパーマリンクプラグインを使用している場合は、post_metaで定義されているURLからpost_idを取得する
  $permalink = str_replace(home_url() . '/', "", $url);
  global $wpdb;
  $id = $wpdb->get_var( $wpdb->prepare( 
  	"
  		SELECT post_id 
  		FROM $wpdb->postmeta 
  		WHERE meta_key = %s AND meta_value =  %s
  	", 
  	'custom_permalink',
  	$permalink
  ) );
  return $id;
}
//内部ブログカードを作成できるURLかどうか
function is_internal_blogcard_url($url){
  $id = url_to_postid( $url );//IDを取得（URLから投稿ID変換）
  $cat = get_category_by_path($url, false);
  //_v($cat);
  //_v($url);
  if ( !$id && class_exists('Custom_Permalinks')) {
    // Custom Permalinksプラグイン使用の場合はidの取得方法を変える
    $id = get_post_id_custom_permalink( $url );
  }
  if ($id || is_home_url($url) || $cat) {
    return true;
  }
}
//内部URLからブログをカードタグの取得
function url_to_internal_blogcard_tag($url){
  if ( !$url ) return;
  $url = strip_tags($url);//URL
  $id = url_to_postid( $url );//IDを取得（URLから投稿ID変換）
  if ( !$id && class_exists('Custom_Permalinks')) {
    // Custom Permalinksプラグイン使用の場合はidの取得方法を変える
    $id = get_post_id_custom_permalink( $url );
  }
  //内部ブログカード作成可能なURLかどうか
  if ( !is_internal_blogcard_url($url) ) return;
  //_v($url);

  $no_image = get_site_screenshot_url($url);
  $thumbnail = null;
  $date_tag = null;
  //投稿・固定ページの場合
  if ($id) {
    //global $post;
    $post_data = get_post($id);
    setup_postdata($post_data);
    $exce = $post_data->post_excerpt;

    $title = $post_data->post_title;//タイトルの取得

    // if (is_wpforo_plugin_page($url)) {
    //   $title = wp_get_document_title();
    // }

    //メタディスクリプションの取得
    $snipet = get_the_page_meta_description($id);
    // _v($id);
    // _v($snipet);
    //$snipet = get_the_snipet( get_the_content(), get_entry_card_excerpt_max_length() );
    //投稿管理画面の抜粋を取得
    if (!$snipet) {
      $snipet = $post_data->post_excerpt;
    }
    //記事本文の抜粋文を取得
    if (!$snipet) {
      $snipet = get_content_excerpt($post_data->post_content, get_entry_card_excerpt_max_length());
    }
    $snipet = preg_replace('/\n/', '', $snipet);

    //日付表示
    $date = null;
    $post_date = mysql2date(get_site_date_format(), $post_data->post_date);
    switch (get_internal_blogcard_date_type()) {
      case 'post_date':
        $date = $post_date;
        break;
      case 'up_date':
        $date = mysql2date(get_site_date_format(), $post_data->post_modified);
        if (!$date) {
          $date = $post_date;
        }
        break;
    }
    if (is_internal_blogcard_date_visible()) {
      $date = '<div class="blogcard-post-date internal-blogcard-post-date">'.$date.'</div>';//日付の取得
      $date_tag = '<div class="blogcard-date internal-blogcard-date">'.$date.'</div>';
    }


    //サムネイルの取得（要160×90のサムネイル設定）
    $thumbnail = get_the_post_thumbnail($id, get_internal_blogcard_thumbnail_size(), array('class' => 'blogcard-thumb-image internal-blogcard-thumb-image', 'alt' => ''));

  } elseif (is_home_url($url)){
    //トップページの場合
    $title = get_front_page_title_caption();
    $snipet = get_front_page_meta_description();
    $image = get_ogp_home_image_url();
    if (!empty($image)) {
      $thumbnail = get_blogcard_thumbnail_image_tag($image);
    }
  } elseif ($cat = get_category_by_path($url, false)){
    //カテゴリページの場合
    $cat_id = $cat->cat_ID;
    //_v(get_category_meta($cat_id));
    $title = get_category_title($cat_id);
    $snipet = get_category_snipet($cat_id);
    $image = get_category_eye_catch($cat_id);
    //_v($image);
    if ($image) {
      $thumbnail = get_blogcard_thumbnail_image_tag($image);
    }
    // _v($cat);
    // $title = get_front_page_title_caption();
    // $snipet = get_front_page_meta_description();
    // $image = get_ogp_home_image_url();

  }
  //_v(get_category_by_path($url));

  //サムネイルが存在しない場合
  if ( !$thumbnail ) {
    $thumbnail = get_blogcard_thumbnail_image_tag($no_image);
  }

  //ブログカードのサムネイルを右側に
  $additional_class = get_additional_internal_blogcard_classes();

  //新しいタブで開く場合
  $target = is_internal_blogcard_target_blank() ? ' target="_blank"' : '';

  //ファビコン
  $favicon_tag =
  '<div class="blogcard-favicon internal-blogcard-favicon">'.
    '<img src="//www.google.com/s2/favicons?domain='.get_the_site_domain().'" class="blogcard-favicon-image internal-blogcard-favicon-image" alt="" width="16" height="16" />'.
  '</div>';

  //サイトロゴ
  $domain = get_domain_name(punycode_decode($url));
  $site_logo_tag = '<div class="blogcard-domain internal-blogcard-domain">'.$domain.'</div>';
  $site_logo_tag = '<div class="blogcard-site internal-blogcard-site">'.$favicon_tag.$site_logo_tag.'</div>';

  //取得した情報からブログカードのHTMLタグを作成
  //_v($url);
  $tag =
  '<a href="'.$url.'" title="'.esc_attr($title).'" class="blogcard-wrap internal-blogcard-wrap a-wrap cf"'.$target.'>'.
    '<div class="blogcard internal-blogcard'.$additional_class.' cf">'.
      '<figure class="blogcard-thumbnail internal-blogcard-thumbnail">'.$thumbnail.'</figure>'.
      '<div class="blogcard-content internal-blogcard-content">'.
        '<div class="blogcard-title internal-blogcard-title">'.$title.'</div>'.
        '<div class="blogcard-snipet internal-blogcard-snipet">'.$snipet.'</div>'.

      '</div>'.
      '<div class="blogcard-footer internal-blogcard-footer cf">'.
        $site_logo_tag.$date_tag.
      '</div>'.
    '</div>'.
  '</a>';

  return $tag;
}