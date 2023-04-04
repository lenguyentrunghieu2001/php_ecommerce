<?php
$category_id = $data['category_edit'];
?>
<div class="container">
    <h1 class="mt-4 text-center">Form edit category</h1>
    <form action="" method="POST">


        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer name ..." name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : $category_id['name'] ?>">
            <?php
            if (isset($message['name'])) {
            ?>
                <h6><?= $message['name'] ?></h6>
            <?php
            }

            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">description</label>
            <textarea class="form-control" id="description_category_post" aria-describedby="emailHelp" placeholder="placeholer description ..." name="description" cols="30" rows="10"><?= isset($_POST['description']) ? $_POST['description'] : $category_id['description'] ?></textarea>
            <?php
            if (isset($message['description'])) {
            ?>
                <h6><?= $message['description'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>

    </form>
</div>
<script>
    CKEDITOR.replace('description_category_post');
</script>