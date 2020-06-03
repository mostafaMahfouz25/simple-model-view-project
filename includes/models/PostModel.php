<?php 



class PostModel 
{
    private $table = "posts";
    private $db;

    public function __construct()
    {
        $this->db = System::get("DB");
    }

    public function getAll()
    {
        return $this->db->getAll($this->table); 
    }


    public function getWhere(int $id)
    {
        $where = "WHERE `post_id`='$id' ";
        return $this->db->getWhere($this->table,$where); 
    }

    public function getPostsWithCategory(int $id)
    {
        $query = "SELECT *,cats.cat_name FROM `posts`  INNER JOIN `cats` ON cats.cat_id = posts.post_cat_id  WHERE posts.post_id='$id' ";
        return $this->db->query($query); 
    }


    public function insert(array $data)
    {
        if($this->db->insert($this->table,$data))
        {
            return true;
        }
        return false;
    }

    public function update(array $data,$id)
    {
        $where = " WHERE `post_id`='$id' ";
        return $this->db->update($this->table,$data,$where);
    }


    public function delete($id)
    {
        $where = "WHERE `post_id`='$id' ";
        return $this->db->delete($this->table,$where);
    }



}