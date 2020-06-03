<?php 

// base url for href links 
define("URL","http://127.0.0.1/toturials/php-course/blog/");
// base of project folders  
define("ROOT_PATH",__DIR__);
define("INC",ROOT_PATH.'/includes/');
define("CORE",INC.'/core/');
define("MODELS",INC.'/models/');
define("CONTROLLERS",INC.'/controllers/');
define("VIEWS",ROOT_PATH.'/views/');

// path for css , js , ...... assets
define("PUB",URL.'public/');
// path to core files 
/**
 * 
 * config file
 */
require_once(CORE.'config.php');
/**
 * 
 * helpers file
 */
require_once(CORE.'helpers.php');


//  generate objects using registery design pattern 
System::store("DB",new DB());
System::store("VIEW",new View());

// get all classes from lib directory 
function __autoload($class_name)
{
    require_once(INC.'/libs/'.$class_name.'.php');

}




