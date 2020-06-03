<?php 
require_once('globals.php');


// get post controller
require_once(CONTROLLERS.'PostController.php');
$post = new PostController();
$post->home();