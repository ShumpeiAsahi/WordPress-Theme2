<?php
add_theme_support('post-thumbnails');


register_nav_menus(
 array(
 'gloval-navigation' => 'グローバル', 
 'place_sidebar' => 'サイドメニュー',
 'footer-navigation' => 'フッター',
 )
); 



/*ウィジェット機能*/
function my_widgets_init() {

	register_sidebar( array(
		'name' => 'サイドバー',
		'id' => 'sidebar_widget01',
		'before_widget' => '<div class="container bg-1 px-0 pb-3 mb-5">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="text-center py-2 mb-3 mt-0 font-weight-bolder titletext bg-1">- ',
		'after_title' => ' -</h4>',
	) );
	register_sidebar( array(
		'name' => 'フッター About',
		'id' => 'footer_widget01',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="d-inline-block py-3 border-bottom border-info">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => 'フッター Twitter',
		'id' => 'footer_widget02',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="d-inline-block py-3 border-bottom border-info">',
		'after_title' => '</h4>',
	) );
}

add_action( 'widgets_init', 'my_widgets_init' );

/*画像をレスポンシブ化*/
add_filter('the_content', 'imgresponsive_replace');
function imgresponsive_replace ($content){
   global $post;
   $pattern = "/\"wp-image(.*?)\"/i";
   $replacement = 'img-fluid';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}

// 記事IDを指定して抜粋文を取得
function ltl_get_the_excerpt($post_id){
global $post;
$post_bu = $post;
$post = get_post($post_id);
setup_postdata($post_id);
$output = get_the_excerpt();
$post = $post_bu;
return $output;
}

//ショートコード
function nlink_scode($atts) {
extract(shortcode_atts(array(
'url'=>"",
'title'=>"",
'excerpt'=>""
),$atts));

$id = url_to_postid($url);//URLから投稿IDを取得

$no_image = 'noimageに指定したい画像があればここにパス';//アイキャッチ画像がない場合の画像を指定

//タイトルを取得
if(empty($title)){
$title = esc_html(get_the_title($id));
}
//抜粋文を取得
if(empty($excerpt)){
$excerpt = esc_html(ltl_get_the_excerpt($id));
}


//アイキャッチ画像を取得
if(has_post_thumbnail($id)) {
$img = wp_get_attachment_image_src(get_post_thumbnail_id($id),'medium');
$img_tag = "<img src='" . $img[0] . "' alt='{$title}'/>";
}else{
$img_tag ='<img src="'.$no_image.'" alt="" width="'.$img_width.'" height="'.$img_height.'" />';
}

$nlink .='
<div class="blog-card">
<a href="'. $url .'">
<div class="blog-card-thumbnail">'. $img_tag .'</div>
<div class="blog-card-content">
<div class="blog-card-title">'. $title .' </div>
<div class="blog-card-excerpt">'. $excerpt .'</div>
</div>
<div class="clear"></div>
</a>
</div>';

return $nlink;
}

add_shortcode("nlink", "nlink_scode");

//Youtubeのレスポンシブ化
function iframe_in_div($the_content) {
if ( is_singular() ) {
$the_content = preg_replace('/<iframe/i', '<div class="youtube"><iframe', $the_content);
$the_content = preg_replace('/<\/iframe>/i', '</iframe></div>', $the_content);
}
return $the_content;
}
add_filter('the_content','iframe_in_div');

//目次を生成する
function insert_table_of_contents( $the_content ){
    if(is_single()) {  //投稿ページの場合
        $tag = '/^<h[2-6].*?>(.+?)<\/h[2-6]>$/im'; //見出しタグの検索パターン
        if(preg_match_all($tag, $the_content, $tags)) { //本文中に見出しタグが含まれていれば
            $idpattern = '/id *\= *["\'](.+?)["\']/i'; //見出しタグにidが定義されているか検索するパターン
            $table_of_contents = '<div class="table_of_contents"><p class="title">\ もくじ /</p><ul>';
            $idnum = 1;
            $nest = 0;
            $nestTag = array();
            for($i = 0 ; $i < count($tags[0]) ; $i++){
                if( ! preg_match_all($idpattern, $tags[0][$i], $idstr) ){
                    //見出しタグにidが定義されていない場合、「autoid_1」のようなidを自動設定
                    $idstr[1][0] = 'autoid_'.$idnum++; 
                    $the_content = preg_replace( "/".str_replace('/', '\/' ,$tags[0][$i])."/", preg_replace('/(^<h[2-6])/i', '${1} id="' . $idstr[1][0] . '" ' , $tags[0][$i]), $the_content,1);
                }
                //見出しへのリンクを目次に追加。<li>でリスト形式に。
                $table_of_contents .= '<li><a href="#' . $idstr[1][0] . '">' . $tags[1][$i] .'</a>';
 
                //見出しのネスト対応
                if($i+1 >= count($tags[0])){
                    $table_of_contents .= '</li>';
                }
                else{
                    preg_match_all('/^<h([2-6])/i' , $tags[0][$i] , $match1);
                    preg_match_all('/^<h([2-6])/i' , $tags[0][$i+1], $match2);
                    if($match1[1][0] < $match2[1][0]){
                        $table_of_contents .= '<ul>';
                        $nestTag[] = $match1[1][0];
                        $nest++;
                    }
                    else if($match1[1][0] == $match2[1][0]){
                        $table_of_contents .= '</li>';
                    }
                    else{
                        while( count($nestTag) > 0 && $nestTag[count($nestTag)-1] >= $match2[1][0]){
                            $table_of_contents .= '</li></ul>';
                            array_splice($nestTag,count($nestTag)-1,1);
                            $nest--;
                        }
                        $table_of_contents .= '</li>';
                    }
                }
            }
 
            //入れ子のまま終わった時<ul>を閉じる
            for(; $nest > 0 ; $nest--){
                $table_of_contents .= '</ul></li>';
            }
 
            $table_of_contents .= '</ul></div>'; //目次の各タグを閉じる
 
            if($tags[0][0]){
                //作った目次を、1番目の見出しタグの直前に追加
                $the_content = preg_replace('/(^<h[2-6].*?>.+?<\/h[2-6]>$)/im', $table_of_contents.'${1}', $the_content,1);
            }
        }
    }
    return $the_content;
}
add_filter('the_content','insert_table_of_contents');

//空白行の自動生成
function insert_blank( $the_content ){
    if(is_single() or is_page()) {   //投稿ページもしくは固定ページの場合
        $pattern = '/(^<p><\/p>$)/im';
        $the_content = preg_replace($pattern,'<pre> </pre>', $the_content); //pタグをpreタグに変換
    }
    return $the_content;
}
add_filter('the_content','insert_blank');

//WordPressのJqueryを読み込まない
function delete_jquery() {
    if (!is_admin()) {
      wp_deregister_script('jquery');
    }
  }
  add_action('init', 'delete_jquery');
?>

