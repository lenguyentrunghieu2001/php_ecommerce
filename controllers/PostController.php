<?php

class PostController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_post';
    protected $table_categorypost = 'tbl_category_post';
    protected $categorymodel;
    protected $categorypostmodel;
    protected $postmodel;

    public function __construct()
    {
        parent::__construct();
        $this->categorymodel = $this->render->model('CategoryModel');
        $this->categorypostmodel = $this->render->model('CategoryPostModel');
        $this->postmodel = $this->render->model('PostModel');
    }

    public function index()
    {
        $this->data['post'] = $this->postmodel->post($this->table);
        $this->data['categorypost'] = $this->categorypostmodel->category($this->table_categorypost);
        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/post', $this->data);
    }

    public function categorypost($id)
    {
        $this->data['categorypost'] = $this->categorypostmodel->category($this->table_categorypost);
        $this->data['post'] = $this->postmodel->findPost($this->table, $id);


        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/post/categorypost', $this->data);
    }

    public function detail($id)
    {
        $this->data['post_detail'] = $this->postmodel->postById($this->table, $id);
        $this->data['category'] = $this->menu($this->categorymodel);
        $this->render->view('shop/inc/menu', $this->data);
        $this->render->layoutUser('shop/post/detail', $this->data);
    }
}
