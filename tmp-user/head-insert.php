<?php
//ヘッダー部分にタグを挿入したいときは、このテンプレートに挿入（ヘッダーに挿入する解析タグなど）
//子テーマのカスタマイズ部分を最小限に抑えたい場合に有効なテンプレートとなります。
//例：<script>解析コード</script>
?>
<?php if (!is_user_administrator()) :
//管理者以外カウントしたくない場合は
//↓ここに挿入?>

<?php endif; ?>
<?php //ログインユーザーも含めてカウントする場合は以下に挿入 ?>

<link rel="stylesheet" href="https://use.typekit.net/gve6vbe.css">

