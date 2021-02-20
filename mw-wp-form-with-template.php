<?php
/**
 * Plugin Name: MW WP Form With Template
 * Plugin URI: https://github.com/hippohack/mw-wp-form-with-template
 * Description: Enable management of MW WP Form email body with template.
 * Version: 0.0.1
 * Author: @hippohack
 * Author URI: https://twitter.com/hippohack
 * Text Domain:
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package
 * @author hippohack
 * @license GPL-2.0+
 */

include_once( plugin_dir_path( __FILE__ ) . 'lib/tinyTemplate.php' );
class MW_WP_Form_With_Template {

  public $tpl;

  public function __construct() {
    // $this->_test();
    $this->tpl = new tinyTemplate();
    // var_dump($tpl);
  }

  public function _test() {
    return 'hoge!!!!';
  }

  public function get_template_data() {

  }

  public function set_values($values) {
    foreach ($values as $key => $value) {
      $this->tpl->set($key, $value);
    }
  }

  public function fetch_template() {
    return $this->tpl->fetch(plugin_dir_path( __FILE__ ) . 'templates/9/default.txt');
  }

  /**
   * フォーム本文をテンプレ化したい
   */
  public function _custom_mail_template($Mail, $values, $Data) {
    $_values = $Data->gets();
    // var_dump($_values);
    // var_dump($Mail, $values, $Data);
    $mail_body = $Mail->body;

    // TODO: ここでテンプレに当て込む処理する
    // TODO: テンプレートを読み込んで１行ごとに配列にする
    // TODO: ループ処理で置換する
    // TODO: $Mail->bodyに入れ込む
    $template = '<div>{{mwform_text-463}}</div>';
    $res = str_replace('{{mwform_text-463}}', $_values['mwform_text-463'], $template);
    var_dump($res);
  }

}
