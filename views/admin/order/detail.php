<h1 class="mt-4 text-center">List Order</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">quantity</th>
            <th scope="col">UserName</th>
            <th scope="col">Address</th>
            <th scope="col">Email</th>
            <th scope="col">Content</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['order_detail'] as $key => $order) {
        ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $order['product_name'] ?></td>
                <td><img width="120px" src="<?= asset ?>/uploads/product/<?= $order['image'] ?>" alt=""></td>
                <td><?= $order['quantity'] ?></td>
                <td><?= $order['name'] ?></td>
                <td><?= $order['address'] ?></td>
                <td><?= $order['email'] ?></td>
                <td><?= $order['content'] ?></td>
            </tr>
        <?php
        }
        ?>

    </tbody>
</table>