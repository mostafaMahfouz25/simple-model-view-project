<?php 


class CatController 
{
    public static function home()
    {
        $data['site_title'] = "Categories";
        System::get('VIEW')->render('categories',$data);
    }
}