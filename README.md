# mw-wp-form-with-template

Enable management of MW WP Form email body with template.

## usues

### function.phpに追記

```php:function.php
//
// activate
//
$form_id = 9; // user form id

// 管理者宛メール
add_filter( 'mwform_admin_mail_mw-wp-form-' . $form_id, function($Mail, $values, $Data) {
  $mwfwt = new MW_WP_Form_With_Template($Data, 'admin');
  $Mail->body = $mwfwt->combine();

  return $Mail;
}, 10, 3 );

// 自動返信メール
add_filter( 'mwform_auto_mail_mw-wp-form-' . $form_id, function($Mail, $values, $Data) {
  $mwfwt = new MW_WP_Form_With_Template($Data, 'auto');
  $Mail->body = $mwfwt->combine();

  return $Mail;
}, 10, 3 );
```

### テンプレートファイルを作成

- `/plugins/mw-wp-form-with-template/templates/` 内に、フォームIDを名前にフォルダを作成
- その中に、`admin.txt` と `auto.txt` を作成する

> NOTE: MW WP FORMの仕様上、メール本文の設定が空だとメールが送信されないので何か書いておく。

## 免責事項

当システムをご利用、もしくはご利用になれないことにより生じるいかなるトラブルや損害には、当方は一切の責任を負いません。

## Special Thanks

miya0001さんのテンプレートエンジンを利用させていただきました。

- [miya0001/tinyTemplate: Template Engine for PHP based on bTemplate](https://github.com/miya0001/tinyTemplate)