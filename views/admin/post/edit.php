<?php
$post_id = $data['post_edit'];
?>
<div class="container">
    <h1 class="mt-4 text-center">Form edit post</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="exampleInputEmail1" class="form-label">Name*</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer name ..." name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : $post_id['name'] ?>">
            <?php
            if (isset($message['name'])) {
            ?>
                <h6><?= $message['name'] ?></h6>
            <?php
            }

            ?>
        </div>



        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">content*</label>
            <textarea class="form-control" id="content_post" aria-describedby="emailHelp" placeholder="placeholer content ..." name="content" cols="30" rows="10"><?= isset($_POST['content']) ? $_POST['content'] :  $post_id['content']  ?></textarea>
            <?php
            if (isset($message['content'])) {
            ?>
                <h6><?= $message['content'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">image*</label>
            <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="placeholer image ..." name="image" value="<?= $post_id['image']  ?>">
            <?php
            if (isset($message['image'])) {
            ?>
                <h6><?= $message['image'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <select class="form-select" aria-label="Default select example" name="category_post_id">
                <option value="" selected>Select category post</option>
                <?php foreach ($data['category_post'] as $category) {
                ?>
                    <option value=<?= $category['id'] ?> <?= $post_id['category_post_id'] ==  $category['id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <?php
            if (isset($message['category_post_id'])) {
            ?>
                <h6><?= $message['category_post_id'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="text-end">
            <button type="submit" class="btn btn-primary" name="save">Save</button>
        </div>

    </form>
</div>
<script>
    CKEDITOR.replace('content_post');
</script>