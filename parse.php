<?php 
//DB Credentials
define('DB_HOST', 'hostname');
define('DB_USER', 'user_name');
define('DB_PASS', 'password');
define('DB_NAME', 'db_name');
//lib for parsing
require_once"simple_html_dom.php";
require_once"db.class.php";

//URL for parsing
$url = 'http://somesite.com';

$db = new DB('DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME');

function getArticleData($url) 
{
    $article = file_get_html($url);
    $tag1 = $article->find('tag1', 0)->innertext;
    $tag2 = $article->find('tag2', 0)->innertext;
    
    $data = array(
        'tag1' => $tag1,
        'tag2' => $tag2
    );
    return $data;
}

function getArticleLinks($url) 
{
    // Get html
    $html = file_get_html($url);
    // Get each article
    foreach($html->find('className') as $link_article) {
        echo $link_article->href. PHP_EOL;
    }

    if($next_link = $html->find('className', 0)) {
        getArticleLinks($next_link->href);
    }
}

