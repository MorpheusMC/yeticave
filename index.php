<?php
/**
 * @var $is_auth
 */
require_once("helpers.php");
require_once("functions.php");
require_once("data.php");
require_once("init.php");

$categories = get_categories($con);
//foreach ($categories as $category => $item){
//    print ($item['character_code']);
//}
//die();
$sql = get_query_list_lots();
$res = mysqli_query($con, $sql);
if ($res) {
    $goods = get_arrow($res);
}else{
    $error = mysqli_error($con);
}

$page_content = include_template("main.php", [
    "categories" => $categories,
    "goods" => $goods
]);
$layout_content = include_template("layout.php", [
    "content" => $page_content,
    "categories" => $categories,
    "title" => "Главная 111",
    "is_auth" => $is_auth,
    "user_name" => $user_name
]);

print ($layout_content);