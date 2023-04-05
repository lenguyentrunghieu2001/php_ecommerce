<?php

class ProductController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_product';
    protected $table_category = 'tbl_category_product';
    protected $productmodel;
    protected $categorymodel;

    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->middleware->isAdmin(session::get('role_id'));
        $this->productmodel = $this->render->model('ProductModel');
        $this->categorymodel = $this->render->model('CategoryModel');
    }

    public function index()
    {
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $image = $_FILES['image']['name'];

            if (empty($description) || empty($name) || empty($category_id) || empty($image)) {
                if (empty($description)) {

                    $this->message['description'] = 'required description';
                }
                if (empty($name)) {
                    $this->message['name'] = 'required name';
                }
                if (empty($category_id)) {
                    $this->message['category_id'] = 'required category_id';
                }
                if (empty($image)) {
                    $this->message['image'] = 'required image';
                }
            } else {
                $this->insertproduct();
                die();
            }
        }
        $this->data['product'] =  $this->productmodel->product($this->table);
        $this->data['product_category'] =  $this->productmodel->selectCategory($this->table, $this->table_category, 'category_id', ['name' => 'category_name']);
        $this->data['category'] = $this->categorymodel->category($this->table_category);
        $this->render->layoutAdmin('admin/product', $this->data, $this->message);
    }


    public function insertproduct()
    {
        if (isset($_POST['save'])) {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $path_uploads = 'public/uploads/product/' . $unique_image;
            move_uploaded_file($tmp_image, $path_uploads);
            $this->data = [
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'quantity' => $_POST['quantity'],
                'image' => $unique_image,
                'category_id' => $_POST['category_id'],
            ];
            $this->productmodel->insertProduct($this->table, $this->data);
            header('location:' . route_product);
        } else {
            header('location:' . route_notfound);
        }
    }


    public function editproduct($id = 0)
    {

        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $description = $_POST['description'];

            if (empty($description) || empty($name)) {
                if (empty($description)) {

                    $this->message['description'] = 'required description';
                }
                if (empty($name)) {
                    $this->message['name'] = 'required name';
                }
            } else {
                $this->updateproduct($id);
                die();
            }
        }

        $this->data['product_edit'] =  $this->productmodel->productById($this->table, $id);
        if (!$this->data['product_edit']) {
            header('location:' . route_notfound);
        }
        $this->data['category'] = $this->categorymodel->category($this->table_category);
        $this->render->layoutAdmin('admin/product/edit', $this->data, $this->message);
    }

    public function updateproduct($id = 0)
    {
        if (isset($_POST['save'])) {
            $image = $_FILES['image']['name'];
            if (empty($image)) {
                $this->data = [
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'description' => $_POST['description'],
                    'quantity' => $_POST['quantity'],
                    'category_id' => $_POST['category_id'],
                ];
            } else {

                $product_id = $this->productmodel->productById($this->table, $id);
                unlink('public/uploads/product/' . $product_id['image']);

                $tmp_image = $_FILES['image']['tmp_name'];
                $div = explode('.', $image);
                $file_ext = strtolower(end($div));
                $unique_image = $div[0] . time() . '.' . $file_ext;
                $path_uploads = 'public/uploads/product/' . $unique_image;
                move_uploaded_file($tmp_image, $path_uploads);
                $this->data = [
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'description' => $_POST['description'],
                    'quantity' => $_POST['quantity'],
                    'image' => $unique_image,
                    'category_id' => $_POST['category_id'],
                ];
            }
            $this->productmodel->updateProduct($this->table, $this->data, 'id', $id);
            header('location:' . route_product);
        } else {
            header('location:' . route_product . '/editproduct/' . $id);
        }
    }

    public function deleteproduct($id = 0)
    {
        if ($id == 0) {
            header('location:' . route_notfound);
        }
        $product_id = $this->productmodel->productById($this->table, $id);
        unlink('public/uploads/product/' . $product_id['image']);
        $this->productmodel->deleteProduct($this->table, 'id', $id);
        header('location:' . route_product);
    }

    public function hot($id)
    {
        $product_id = $this->productmodel->productById($this->table, $id);

        if ($product_id['hot'] == 0) {
            $this->productmodel->updateProduct($this->table, ['hot' => 1], 'id', $id);
            header('location:' . route_product);
        } else {
            $this->productmodel->updateProduct($this->table, ['hot' => 0], 'id', $id);
            header('location:' . route_product);
        }
    }
}
