<?php

class CategoryController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_category_product';
    protected $table_product = 'tbl_product';
    protected $categorymodel;
    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->middleware->isAdmin(session::get('role_id'));
        $this->categorymodel = $this->render->model('CategoryModel');
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

        $this->data['category'] =  $this->categorymodel->category($this->table);

        $this->render->layoutAdmin('admin/category', $this->data, $this->message);
    }


    public function insertcategory()
    {
        if (isset($_POST['save'])) {
            $this->data = [
                'description' => $_POST['description'],
                'name' => $_POST['name'],
            ];
            $this->categorymodel->insertCategory($this->table, $this->data);
            header('location:' . route_category);
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

        $this->data['category_edit'] =  $this->categorymodel->categoryById($this->table, $id);
        if (!$this->data['category_edit']) {
            header('location:' . route_notfound);
        }

        $this->render->layoutAdmin('admin/category/edit', $this->data, $this->message);
    }

    public function updatecategory($id = 0)
    {
        if (isset($_POST['save'])) {
            $this->data = [
                'description' => $_POST['description'],
                'name' => $_POST['name'],
            ];
            $this->categorymodel->updateCategory($this->table, $this->data, 'id', $id);
            header('location:' . route_category);
        } else {
            header('location:' . route_category . '/editcategory/' . $id);
        }
    }

    public function deletecategory($id = 0)
    {
        $this->categorymodel->deleteProductCategory($this->table_product, 'category_id', $id);
        $this->categorymodel->deleteCategory($this->table, 'id', $id);
        header('location:' . route_category);
    }

    // public function deletemutiplecategory($id)
    // {
    //     $array = explode(',', $id);
    // $this->categorymodel = $this->render->model('CategoryModel');
    // $this->categorymodel->updateCategory($this->table, 'id', $id);
    // header('location:/E-commerce-Figure/category');
    // }
}
