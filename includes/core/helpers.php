<?php 

function url($url)
{
    if($url == '')
    {
        echo URL.'home';
    }
    else 
    {
        echo URL . $url;
    }
}


// get segment  
function getSegment()
{
    $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    return $uriSegments[4];
}


// not found 
function notFound()
{
    System::get('VIEW')->render('not_found');
}