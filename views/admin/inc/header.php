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
    <?php
    include('nav.php');
    ?>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <?php
            include('sidebar.php');
            ?>
            <div class="col py-3">