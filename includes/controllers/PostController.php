<?php 

// get Post Model
require_once(MODELS.'PostModel.php');
class PostController 
{
    private $system;
    private $model;

    public function __construct()
    {
        $this->model = new PostModel();
    }
  
    public function home()
    {
        $data['site_title'] = "All Posts";
        $data['posts'] = $this->model->getAll();
        System::get('VIEW')->render('posts/index',$data);
    }

    // show post 
    public function showPost()
    {
        $data['site_title'] = "Edit Post";
        $row = array();
        if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
            $id = (int) $_GET['id'];
            $row = $this->model->getPostsWithCategory($id);
        }

        // check if this item is exisits ot not 
        if(count($row))
        {
            $data['row'] = $row[0];
            System::get('VIEW')->render('posts/show_post',$data);
        }
        else 
        {
            notFound();
        }
        
        
    }

    public function addPost()
    {
        $data['site_title'] = "Add Post";
        System::get('VIEW')->render('posts/add_post');
    }

    public function insertPost()
    {
        $data['site_title'] = "Add Post";
        $result = false;
        if(isset($_POST['submit']))
        {
            $post_title = $_POST['post_title'];
            $post_content = $_POST['post_content'];

            $data_insert = array("post_title"=>$post_title,"post_content"=>$post_content,'post_cat_id'=>1);
            $result = $this->model->insert($data_insert);
        
            if($result)
            {
                $data['success'] = "Added Success";
            }
            else 
            {
                $data['error'] = "Error : ";
            }
            System::get('VIEW')->render('posts/add_post',$data);
        }
        else 
        {
            notFound();
        }
        
    }





    // edit post 
    public function editPost()
    {
        $data['site_title'] = "Edit Post";
        $row = array();
        if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
            $id = (int) $_GET['id'];
            $row = $this->model->getPostsWithCategory($id);
        }

        // check if this item is exisits ot not 
        if(count($row))
        {
            $data['row'] = $row[0];
            System::get('VIEW')->render('posts/edit_post',$data);
        }
        else 
        {
            notFound();
        }
        
        
    }


    // update Post
    public function updatePost()
    {
        $data['site_title'] = "Update Post";
        $result = false;
        if(isset($_POST['submit']))
        {
            $post_title = $_POST['post_title'];
            $post_content = $_POST['post_content'];
            $id = $_POST['post_id'];

            $data_insert = array("post_title"=>$post_title,"post_content"=>$post_content);
            $result = $this->model->update($data_insert,$id);
        
            if($result)
            {
                $data['success'] = "Updated Success";
            }
            else 
            {
                $data['error'] = "Error : ";
            }
            System::get('VIEW')->render('posts/update_post',$data);
        }
        else 
        {
            notFound();
        }
        
    }


    





    // delete post
    public function deletePost()
    {
        $data['site_title'] = "Delete Post";
        $row = array();
        if(isset($_GET['id']) && is_numeric($_GET['id']))
        {
            $id = (int) $_GET['id'];
            $row = $this->model->getWhere($id);
        }

        // check if this item is exisits ot not 
        if(count($row))
        {
            // delete post
            if($this->model->delete($id))
            {
                $data['success'] = "Deleted Success";
            }
            else 
            {
                $data['error'] = "Error : ";
            }
            System::get('VIEW')->render('posts/delete_post',$data);
        }
        else 
        {
            notFound();
        }


    }



}