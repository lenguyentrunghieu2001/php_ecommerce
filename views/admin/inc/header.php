<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin E-commerece Figure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= asset ?>/css/admin/style.css">
    <script type="text/javascript" src="<?= asset ?>/ckeditor/ckeditor.js"></script>

</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-success" href="<?= BASE_URL ?>">Redirect User</a>

            <div>
                <span class="text-light"><?= session::get('username') ?></span>
                <a class="navbar-brand text-danger" href="<?= route_login . 'logout' ?>">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" style="margin: 20% 0; font-size: 25px;" id="menu">
                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_admin ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <hr class="w-100">

                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_account ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Account</span>
                            </a>
                        </li>
                        <hr class="w-100">

                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_category ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Category_Product</span>
                            </a>
                        </li>
                        <hr class="w-100">

                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_product ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Product</span>
                            </a>
                        </li>
                        <hr class="w-100">

                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_category_post ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Category Post</span>
                            </a>
                        </li>
                        <hr class="w-100">

                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_post ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Post</span>
                            </a>
                        </li>
                        <hr class="w-100">
                        <li class="nav-item mb-3 mt-1">
                            <a href="<?= route_order ?>" class="nav-link align-middle px-0 text-white">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Order management</span>
                            </a>
                        </li>
                    </ul>
                    <hr>

                </div>
            </div>
            <div class="col py-3">