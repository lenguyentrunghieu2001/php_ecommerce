<?php
$product_id = $data['product_edit'];
?>
<div class="container">
    <h1 class="mt-4 text-center">Form edit product</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer name ..." name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : $product_id['name'] ?>">
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
                <label for="exampleInputEmail1" class="form-label">price</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer price ..." name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : $product_id['price'] ?>">
                <?php
                if (isset($message['price'])) {
                ?>
                    <h6><?= $message['price'] ?></h6>
                <?php }
                ?>
            </div>
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">quantity</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer quantity ..." name="quantity" value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : $product_id['quantity'] ?>">
                <?php
                if (isset($message['quantity'])) {
                ?>
                    <h6><?= $message['quantity'] ?></h6>
                <?php }
                ?>
            </div>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description*</label>
            <textarea class="form-control" id="description_product" aria-describedby="emailHelp" placeholder="placeholer description ..." name="description" cols="30" rows="10"><?= isset($_POST['description']) ? $_POST['description'] :  $product_id['description']  ?></textarea>
            <?php
            if (isset($message['description'])) {
            ?>
                <h6><?= $message['description'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">image*</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer image ..." name="image" value="<?= $product_id['image']  ?>">
            <?php
            if (isset($message['image'])) {
            ?>
                <h6><?= $message['image'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="" selected>Select category</option>
                <?php foreach ($data['category'] as $category) {
                ?>
                    <option value=<?= $category['id'] ?> <?= $product_id['category_id'] ==  $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
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
        <div class="text-end">
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>

    </form>
</div>
<script>
    CKEDITOR.replace('description_product');
</script>