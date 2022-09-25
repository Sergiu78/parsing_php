<?php 
//lib for parsing
require_once"simple_html_dom.php";

//URL for parsing
$url = 'http://somesite.com';

function getArticle($url) 
{
    // Get html
    $html = file_get_html($url);
    // Get each article
    foreach($html->find('className') as $link_article) {
        echo $link_article->href. PHP_EOL;
    }
}

