<?php 
require_once('globals.php');


// get post controller
require_once(CONTROLLERS.'PostController.php');
$post = new PostController();

switch (getSegment()) {
    case 'posts':
        $post->home();
        break;
    case 'show-post':
        $post->ahowPost();
        break;
    case 'add-post':
        $post->addPost();
        break;
    case 'insert-post':
        $post->insertPost();
        break;
    case 'edit-post':
        $post->editPost();
        break;
    case 'update-post':
        $post->updatePost();
        break;
    case 'delete-post':
        $post->deletePost();
        break;
    default:
        $post->home();
        break;
}
