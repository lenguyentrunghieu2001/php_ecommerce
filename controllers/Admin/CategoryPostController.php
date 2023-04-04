<?php

class CategoryPostController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_category_post';
    protected $categorypostmodel;
    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->middleware->isAdmin(session::get('role_id'));
        $this->categorypostmodel = $this->render->model('CategoryPostModel');
    }

    public function index()
    {
        if (isset($_POST['save'])) {
            $description = $_POST['description'];
            $name = $_POST['name'];
            if (empty($description) || empty($name)) {
                if (empty($description)) {

                    $this->message['description'] = 'required description';
                }
                if (empty($name)) {
                    $this->message['name'] = 'required name';
                }
            } else {
                $this->insertcategory();
                die();
            }
        }

        $this->data['category_post'] =  $this->categorypostmodel->category($this->table);

        $this->render->layoutAdmin('admin/category_post', $this->data, $this->message);
    }


    public function insertcategory()
    {
        if (isset($_POST['save'])) {
            $this->data = [
                'description' => $_POST['description'],
                'name' => $_POST['name'],
            ];
            $this->categorypostmodel->insertCategory($this->table, $this->data);
            header('location:' . route_category_post);
        } else {
            header('location:' . route_notfound);
        }
    }

    public function editcategory($id = 0)
    {

        if (isset($_POST['save'])) {
            $description = $_POST['description'];
            $name = $_POST['name'];
            if (empty($description) || empty($name)) {
                if (empty($description)) {

                    $this->message['description'] = 'require description';
                }
                if (empty($name)) {
                    $this->message['name'] = 'require name';
                }
            } else {
                $this->updatecategory($id);
                die();
            }
        }

        $this->data['category_edit'] =  $this->categorypostmodel->categoryById($this->table, $id);
        if (!$this->data['category_edit']) {
            header('location:' . route_notfound);
        }

        $this->render->layoutAdmin('admin/category_post/edit', $this->data, $this->message);
    }

    public function updatecategory($id = 0)
    {
        if (isset($_POST['save'])) {
            $this->data = [
                'description' => $_POST['description'],
                'name' => $_POST['name'],
            ];
            $this->categorypostmodel->updateCategory($this->table, $this->data, 'id', $id);
            header('location:' . route_category_post);
        } else {
            header('location:' . route_category_post . '/editcategory/' . $id);
        }
    }

    public function deletecategory($id = 0)
    {
        $this->categorypostmodel->deleteCategory($this->table, 'id', $id);
        header('location:' . route_category_post);
    }

    // public function deletemutiplecategory($id)
    // {
    //     $array = explode(',', $id);
    // $this->categorypostmodel = $this->render->model('CategorypostModel');
    // $this->categorypostmodel->updateCategory($this->table, 'id', $id);
    // header('location:/E-commerce-Figure/category');
    // }
}
