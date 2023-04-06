<h1 class="mt-4 text-center">List Order</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Code Order</th>
            <th scope="col">Date</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['order'] as $key => $order) {
        ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $order['code'] ?></td>
                <td><?= $order['date'] ?></td>
                <td><?= $order['status'] == 0 ? 'Đơn hàng mới' : 'Đã Xử Lý' ?></td>
                <td>
                    <a href="<?= route_order ?>/orderdetail/<?= $order['code'] ?>" class="btn btn-warning">Xem Đơn</a>
                    <?php
                    if ($order['status'] == 0) {
                    ?>
                        <a href="<?= route_order ?>/orderproccess/<?= $order['id'] ?>" class="btn btn-success">Xử lý Đơn</a>

                    <?php } ?>
                </td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>