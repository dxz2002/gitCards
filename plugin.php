<?php
/**
 * Plugin Name: GitCards
 * Plugin URI: https://daidr.me/archives/app-267.html
 * Description: 在你的文章中插入Git仓库卡片
 * Version: 1.0.0
 * Author: 戴兜
 * Author URI: https://daidr.me
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 * @package CGB
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define('GITCARDS_FILE', __FILE__);
define('GITCARDS_VERSION'， '1.0.0');
define('GITCARDS_URL'， plugins_url('', __FILE__));
define('GITCARDS_PATH'， dirname(__FILE__));
define('GITCARDS_ADMIN_URL'， admin_url());


require_once GITCARDS_PATH . '/src/init.php';

//加载CSS和JS
function gitcards_enqueue_scripts() {
    wp_register_style('gitcards-style', plugins_url('dist/blocks.style.build.css', __FILE__));
    wp_enqueue_style('gitcards-style');

    wp_register_style('gitcards-editor-style', plugins_url('dist/blocks.editor.build.css', __FILE__));
    wp_enqueue_style('gitcards-editor-style');

    wp_register_script('gitcards-script', plugins_url('dist/blocks.build.js', __FILE__), array('wp-blocks', 'wp-element', 'wp-editor'), true);
    wp_enqueue_script('gitcards-script');

    wp_register_script('gitcards-js', plugins_url('js/gitcards.js', __FILE__), array('jquery'), true);
    wp_enqueue_script('gitcards-js');
}

add_action('wp_enqueue_scripts', 'gitcards_enqueue_scripts');
add_action('enqueue_block_editor_assets', 'gitcards_enqueue_scripts');
