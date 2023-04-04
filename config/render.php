<?php

class Render
{
    public function __construct()
    {
    }

    public function view($fileName, $data = NULL, $message = NULL)
    {
        include './views/' . $fileName . '.php';
    }

    public function layoutUser($fileName, $data = NULL, $message = NULL)
    {
        include './views/shop/inc/header.php';
        $this->view($fileName, $data, $message);
        include './views/shop/inc/footer.php';
    }


    public function layoutAdmin($fileName, $data = NULL, $message = NULL)
    {
        include './views/admin/inc/header.php';
        $this->view($fileName, $data, $message);
        include './views/admin/inc/footer.php';
    }

    public function model($fileName)
    {
        include './models/' . $fileName . '.php';
        return new $fileName();
    }

    public function css($fileName)
    {
        return './public/' . $fileName . '.css';
    }
}
