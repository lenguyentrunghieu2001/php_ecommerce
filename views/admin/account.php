    <div class="container">
        <h1 class="mt-4 text-center">List Account</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data['account'] as $key => $account) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $account['username'] ?></td>
                        <td><?= $account['role_id'] === 1 ? 'Admin' : 'User' ?></td>
                        <td>
                            <a href="<?= route_account ?>updateroleid/<?= $account['id'] ?>" class="btn btn-<?= $account['role_id'] === 1 ? 'success' : 'primary' ?>">Update Role</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>


    </div>
    </div>