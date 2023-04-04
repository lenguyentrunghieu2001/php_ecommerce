<?php

class PostController extends Controller
{
    protected $data;
    protected $message;
    protected $table = 'tbl_post';
    protected $table_category_post = 'tbl_category_post';
    protected $postmodel;
    protected $categorymodel;

    public function __construct()
    {
        parent::__construct();
        $this->middleware->auth();
        $this->middleware->isAdmin(session::get('role_id'));
        $this->postmodel = $this->render->model('PostModel');
        $this->categorymodel = $this->render->model('CategoryPostModel');
    }

    public function index()
    {
        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];
            $category_post_id = $_POST['category_post_id'];
            $image = $_FILES['image']['name'];

            if (empty($content) || empty($name) || empty($category_post_id) || empty($image)) {
                if (empty($content)) {

                    $this->message['content'] = 'required content';
                }
                if (empty($name)) {
                    $this->message['name'] = 'required name';
                }
                if (empty($category_post_id)) {
                    $this->message['category_post_id'] = 'required category post';
                }
                if (empty($image)) {
                    $this->message['image'] = 'required image';
                }
            } else {
                $this->insertpost();
                die();
            }
        }
        $this->data['post'] =  $this->postmodel->post($this->table);
        $this->data['post_category'] =  $this->postmodel->selectCategoryPost($this->table, $this->table_category_post, 'category_post_id', ['name' => 'category_name']);
        $this->data['category_post'] = $this->categorymodel->category($this->table_category_post);
        $this->render->layoutAdmin('admin/post', $this->data, $this->message);
    }


    public function insertpost()
    {
        if (isset($_POST['save'])) {
            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];
            $div = explode('.', $image);
            $file_ext = strtolower(end($div));
            $unique_image = $div[0] . time() . '.' . $file_ext;
            $path_uploads = 'public/uploads/post/' . $unique_image;
            move_uploaded_file($tmp_image, $path_uploads);

            $this->data = [
                'name' => $_POST['name'],
                'content' => $_POST['content'],
                'image' => $unique_image,
                'category_post_id' => $_POST['category_post_id'],
            ];
            $this->postmodel->insertpost($this->table, $this->data);
            header('location:' . route_post);
        } else {
            header('location:' . route_notfound);
        }
    }


    public function editpost($id = 0)
    {

        if (isset($_POST['save'])) {
            $name = $_POST['name'];
            $content = $_POST['content'];

            if (empty($content) || empty($name)) {
                if (empty($content)) {

                    $this->message['content'] = 'required content';
                }
                if (empty($name)) {
                    $this->message['name'] = 'required name';
                }
            } else {
                $this->updatepost($id);
                die();
            }
        }

        $this->data['post_edit'] =  $this->postmodel->postById($this->table, $id);
        if (!$this->data['post_edit']) {
            header('location:' . route_notfound);
        }
        $this->data['category_post'] = $this->categorymodel->category($this->table_category_post);
        $this->render->layoutAdmin('admin/post/edit', $this->data, $this->message);
    }

    public function updatepost($id = 0)
    {
        if (isset($_POST['save'])) {
            $image = $_FILES['image']['name'];
            if (empty($image)) {
                $this->data = [
                    'name' => $_POST['name'],
                    'content' => $_POST['content'],
                    'category_post_id' => $_POST['category_post_id'],
                ];
            } else {
                $post_id = $this->postmodel->postById($this->table, $id);
                unlink('public/uploads/post/' . $post_id['image']);

                $tmp_image = $_FILES['image']['tmp_name'];
                $div = explode('.', $image);
                $file_ext = strtolower(end($div));
                $unique_image = $div[0] . time() . '.' . $file_ext;
                $path_uploads = 'public/uploads/post/' . $unique_image;
                move_uploaded_file($tmp_image, $path_uploads);

                $this->data = [
                    'name' => $_POST['name'],
                    'content' => $_POST['content'],
                    'image' => $unique_image,
                    'category_post_id' => $_POST['category_post_id'],
                ];
            }
            $this->postmodel->updatePost($this->table, $this->data, 'id', $id);
            header('location:' . route_post);
        } else {
            header('location:' . route_post . '/editpost/' . $id);
        }
    }

    public function deletepost($id = 0)
    {
        if ($id == 0) {
            header('location:' . route_notfound);
        }
        $post = $this->postmodel->postById($this->table, $id);
        unlink('public/uploads/post/' . $post['image']);
        $this->postmodel->deletePost($this->table, 'id', $id);
        header('location:' . route_post);
    }
}
