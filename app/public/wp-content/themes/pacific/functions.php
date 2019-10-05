<?php 

//カスタムヘッダー
add_theme_support(
    'custom-header',
    array(
        'width'=> 950,
        'height'=>295,
        'header-text'=> false,
        'default-image'=>'%s/images/top/,main_image.png'
    )
    );

//カスタムメニュー
register_nav_menus(
    array(
        'place_global'=> 'グローバル',
        'place_utility'=> 'ユーティリティ'
    )
);

//アイキャッチ画像利用記述
add_theme_support('post-thumbnails');

//アイキャッチ画像サイズ設定
set_post_thumbnail_size(90, 90, true);

//サイドバー用サイズ
add_image_size('small_thumbnail', 61, 61, true);

//アーカイブ用サイズ
add_image_size('large_thumbnail', 120, 120, true);

//サブページヘッダー用サイズ
add_image_size('category_thumbnail', 658, 113, true);

//モールイメージ用サイズ
add_image_size('pickup_thumbnail', 302, 123, true);

//Child page shortcodeのCSSのURL変更

function change_child_pages_shortcode_css(){
    $url = get_template_directory_uri() . '/css/child-pages-shortcode/style.css';
    return $url;
}
add_filter('child-pages-shortcode-stylesheet', 'change_child_pages_shortcode_css');


//ウィジット
register_sidebar(array(
    'name' => 'サイドバーウィジットエリア(上)',
    'id' => 'primary-widget-area',
    'description' => 'サイドバー上部のウィジットエリア',
    'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
));

register_sidebar(array(
    'name' => 'サイドバーウィジットエリア(下)',
    'id' => 'secondary-widget-area',
    'description' => 'サイドバー下部のウィジットエリア',
    'before_widget' => '<aside id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h1 class="widget-title">',
    'after_title' => '</h1>',
));


//抜粋文自動生成時、最期につける文字の変更
function cms_excerpt_more(){
    return ' ...';
}
add_filter('excerpt_more', 'cms_excerpt_more');


//抜粋文自動生成時のデフォルト文字数変更
function cms_excerpt_length(){
    return 120;
}
add_filter('excerpt_mblength', 'cms_excerpt_length');

add_post_type_support('page', 'excerpt');

//30文字抜粋テンプレートタグ作成
function the_short_excerpt(){
    add_filter('excerpt_mblength', 'short_excerpt_length',11);
    the_excerpt();
    remove_filter('excerpt_mblength', 'short_excerpt_length',11);
}

function short_excerpt_length(){
    return 30;
}

//50文字抜粋テンプレートタグ作成
function the_pickup_excerpt(){
    add_filter('get_the_excerpt', 'get_pickup_excerpt',0);
    add_filter('excerpt_mblength', 'pickup_excerpt_length',11);
    the_excerpt();
    remove_filter('get_the_excerpt', 'get_pickup_excerpt',0);
    remove_filter('excerpt_mblength', 'pickup_excerpt_length',11);
}

//トップページのピックアップ（モール紹介）部分　切り詰め
function get_pickup_excerpt($excerpt){
    if($excerpt){
        $excerpt = strip_tags($excerpt);
        $excerpt_len = mb_strlen($excerpt);
        if($excerpt_len > 50){
            $excerpt = mb_substr($excerpt, 0, 50) . ' ...';
        }
    }
    return $excerpt;
}

function pickup_excerpt_length(){
    return 50;
}

//カテゴリー画像の表示
//1.アイキャッチ画像が設定されている時は使用
//2.アイキャッチが設定されていない固定ページ時、最上位固定ページにアイキャッチ画像があればそれを使用
//3.それ以外はデフォルト画像使用


function the_category_image(){
    global $post;
    $image = "";

    if(is_singular() && has_post_thumbnail()){ //個別投稿かつアイキャッチ画像の有無判定
        $image = get_the_post_thumbnail(null, 'category_thumbnail', array('id' => 'category_image'));
    }elseif(is_page() && has_post_thumbnail( array_pop(get_post_ancestors($post)))){
        $image = get_the_post_thumbnail(array_pop(get_post_ancestors($post)), 'category_thumbnail', array('id' => 'category_image'));
    }

    if($image == ""){
        $src = get_template_directory_uri() . '/images/category/default.jpg';
            $image = '<img src="' . $src .'" class="attachment-category_image wp-post-image" alt="" id="category_image" />';
    }
    echo $image;
    }

?>


