<?php

add_action('admin_menu', 'cocoon_child_menu');

function cocoon_child_menu() {
  // add_options_page('Cocoon子テーマ設定', 'Cocoon子テーマ設定', 8, 'cocoon_child_menu', 'cocoon_child_options_page');
  add_menu_page( 'Cocoon子テーマ設定', 'Cocoon子テーマ設定', 8, 'cocoon_child_menu', 'cocoon_child_options_page', null, 30 );
  add_action( 'admin_init', 'cocoon_child_menu_settings' );
}

function cocoon_child_menu_settings() {
  register_setting( 'cocoon-child-settings-group', OP_SITE_FOOTER_BACKGROUND_COLOR );
  register_setting( 'cocoon-child-settings-group', OP_SITE_HOVER_COLOR );
  register_setting( 'cocoon-child-settings-group', OP_CATEGORY_ENTRY_CARD_TYPE );
  register_setting( 'cocoon-child-settings-group', OP_IS_RECOMMEND_AREA_ENABLE );
  register_setting( 'cocoon-child-settings-group', OP_IS_RECOMMEND_AREA_ENABLE );
  register_setting( 'cocoon-child-settings-group', OP_IS_RECOMMEND_SLIDER_AREA_ENABLE );
  register_setting( 'cocoon-child-settings-group', OP_CATEGORY_ENTRY_COUNT );
}

function cocoon_child_options_page() {
?>
  <div class="wrap">
    <?php //var_dump($GLOBALS['menu']); ?>
    <h2>Cocoon子テーマ設定</h2>
    <form method="post" action="options.php">
      <?php 
        settings_fields( 'cocoon-child-settings-group' );
        do_settings_sections( 'cocoon-child-settings-group' );
      ?>
    <h3>TOPページ設定</h3>
    <div class="childsetting_section">
      <table class="form-table">
        <tbody>
          <tr>
            <th scope="row">
              <?php generate_label_tag(OP_ENTRY_CARD_TYPE, __('カテゴリー一覧 カードタイプ', THEME_NAME) ); ?>
            </th>
            <td>
              <?php
              $options = array(
                'entry_card' => __( 'エントリーカード（デフォルト）', THEME_NAME ),
                'big_card_first' => __( '大きなカード（先頭のみ）', THEME_NAME ),
                'big_card' => __( '大きなカード', THEME_NAME ),
                'vertical_card_2' => __( '縦型カード2列', THEME_NAME ),
                'vertical_card_3' => __( '縦型カード3列', THEME_NAME ),
                'tile_card_2' => __( 'タイルカード2列', THEME_NAME ),
                'tile_card_3' => __( 'タイルカード3列', THEME_NAME ),
              );
              generate_radiobox_tag(OP_CATEGORY_ENTRY_CARD_TYPE, $options, get_category_entry_card_type());
              generate_tips_tag(__( 'カテゴリリストのカード表示を変更します。カード表示数を変更するには、「設定→1ページに表示する最大投稿数」から変更してください。', THEME_NAME ).get_help_page_tag('https://wp-cocoon.com/index-entry-card-type/'));
              generate_tips_tag(__( '縦型カード・タイルカードに設定した場合はサムネイルの再生成を行ってください。', THEME_NAME ).get_help_page_tag('https://wp-cocoon.com/regenerate-thumbnails/'));
  
              ?>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <?php generate_label_tag(OP_CATEGORY_ENTRY_COUNT, __('カテゴリリストのエントリー数', THEME_NAME) ); ?>
            </th>
            <td>
              <?php
              generate_number_tag(OP_CATEGORY_ENTRY_COUNT,  get_category_entry_count(), '');
              generate_tips_tag(__( 'カテゴリリストで表示する記事数を指定します', THEME_NAME ));
              ?>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <?php generate_label_tag(OP_IS_RECOMMEND_SLIDER_AREA_ENABLE, __('Recommendスライダーエリアを表示', THEME_NAME) ); ?>
            </th>
            <td>
              <?php
              generate_checkbox_tag(OP_IS_RECOMMEND_SLIDER_AREA_ENABLE, is_recommend_slider_area_enable(), __( 'Recommendスライダーエリア表示を有効にする', THEME_NAME ));
              ?>
              <?php generate_tips_tag(__( 'ヘッダにスライダーでオススメ記事が表示されます。「オススメ」タグを付けた記事が表示されます。', THEME_NAME )); ?>
            </td>
          </tr>
          <tr>
            <th scope="row">
              <?php generate_label_tag(OP_IS_RECOMMEND_AREA_ENABLE, __('Recommendエリアを表示', THEME_NAME) ); ?>
            </th>
            <td>
              <?php
              generate_checkbox_tag(OP_IS_RECOMMEND_AREA_ENABLE, is_recommend_area_enable(), __( 'Recommendエリア表示を有効にする', THEME_NAME ));
              ?>
              <?php generate_tips_tag(__( 'トップページの最初にオススメの記事リストを表示します。「ピックアップ」タグを付けた記事が表示されます。', THEME_NAME )); ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      <?php submit_button(__( '変更を保存', THEME_NAME )); ?>
    </form>
  </div>
<?php
}
?>