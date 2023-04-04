<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="<?= BASE_URL ?>">Redirect User</a>

        <div>
            <span class="text-light"><?= session::get('username') ?></span>
            <a class="navbar-brand text-danger" href="<?= route_login . 'logout' ?>">Logout</a>
        </div>
    </div>
</nav>