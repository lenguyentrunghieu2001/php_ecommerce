<div class="container">
    <h1 class="mt-4 text-center">Add Product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer name ..." name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
            <?php
            if (isset($message['name'])) {
            ?>
                <h6><?= $message['name'] ?></h6>
            <?php
            }

            ?>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer price ..." name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : 0 ?>">
                <?php
                if (isset($message['price'])) {
                ?>
                    <h6><?= $message['price'] ?></h6>
                <?php }
                ?>
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer quantity ..." name="quantity" value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : 0 ?>">
                <?php
                if (isset($message['quantity'])) {
                ?>
                    <h6><?= $message['quantity'] ?></h6>
                <?php }
                ?>
            </div>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description*</label>
            <textarea class="form-control" id="description_product" aria-describedby="emailHelp" placeholder="placeholer description ..." name="description" cols="30" rows="10"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
            <?php
            if (isset($message['description'])) {
            ?>
                <h6><?= $message['description'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category*</label>

            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="" selected>Select category</option>
                <?php foreach ($data['category'] as $category) {
                ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <?php
            if (isset($message['category_id'])) {
            ?>
                <h6><?= $message['category_id'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">image*</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer image ..." name="image">
            <?php
            if (isset($message['image'])) {
            ?>
                <h6><?= $message['image'] ?></h6>
            <?php }
            ?>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>

    </form>

    <h1 class="mt-4 text-center">List Product</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['product_category'] as $key => $product) {
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><img width="80" src="<?= asset . '/uploads/product/' . $product['image']  ?>" alt=""></td>
                    <td><?= number_format($product['price']) . ' đ'  ?></td>
                    <td><?= $product['quantity'] ?></td>
                    <td><?= $product['category_name'] ?></td>

                    <td>
                        <a href="<?= route_product ?>/editproduct/<?= $product['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= route_product ?>/deleteproduct/<?= $product['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


</div>
<script>
    CKEDITOR.replace('description_product');
</script>