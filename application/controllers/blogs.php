<?php

class Blogs extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

    }

    public function index($blog_name)
    {
        echo 'BLOG NAME '.$blog_name;
    }
}

/* end of controllers/blogs.php */