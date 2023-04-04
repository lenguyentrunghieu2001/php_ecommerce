<?php

class PostController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 'this is a bài viết';
    }

    function chitietbaiviet()
    {
        echo ' chi tiet bai viet';
    }
}
