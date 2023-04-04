<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= asset ?>/css/login.css">
</head>

<body>

    <!-- <div class="container">
        <h1 class="mt-4 text-center">LOGIN</h1>
        <form action="" method="POST" style="width: 40%; margin: 0 30%;">
            <?php
            if (isset($message['login'])) {
            ?>
                <h6><?= $message['login'] ?></h6>
            <?php }
            ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">username</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập username ..." name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                <?php
                if (isset($message['username'])) {
                ?>
                    <h6><?= $message['username'] ?></h6>
                <?php }
                ?>
            </div>

            <div class="mb-3">

                <label for="exampleInputEmail1" class="form-label">password</label>
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Vui lòng nhập password ..." name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                <?php
                if (isset($message['password'])) {
                ?>
                    <h6><?= $message['password'] ?></h6>
                <?php
                }

                ?>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="login">Đăng nhập</button>
            </div>

        </form>
    </div> -->
    <div class="login-box">
        <h2>Login</h2>
        <?php
        if (isset($message['login'])) {
        ?>
            <h6><?= $message['login'] ?></h6>
        <?php }
        ?>
        <form method="POST" action="">
            <div class="user-box">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="username" value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                <label>Username*</label>
                <?php
                if (isset($message['username'])) {
                ?>
                    <h6><?= $message['username'] ?></h6>
                <?php }
                ?>
            </div>

            <div class="user-box">
                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="password" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                <label>Password*</label>
                <?php
                if (isset($message['password'])) {
                ?>
                    <h6><?= $message['password'] ?></h6>
                <?php
                }     ?>
            </div>



            <button type="submit" name="login">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Submit
            </button>
        </form>
    </div>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>