<div class="container">
    <h1 class="mt-4 text-center">Add Post</h1>
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
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Content*</label>
            <textarea class="form-control" id="content_product" aria-describedby="emailHelp" placeholder="placeholer content ..." name="content" cols="30" rows="10"><?= isset($_POST['content']) ? $_POST['content'] : '' ?></textarea>
            <?php
            if (isset($message['content'])) {
            ?>
                <h6><?= $message['content'] ?></h6>
            <?php }
            ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category Post*</label>

            <select class="form-select" aria-label="Default select example" name="category_post_id">
                <option value="" selected>Select category</option>
                <?php foreach ($data['category_post'] as $category) {
                ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
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

    <h1 class="mt-4 text-center">List Post</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['post_category'] as $key => $post) {
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $post['name'] ?></td>
                    <td><img width="80" src="<?= asset . '/uploads/post/' . $post['image']  ?>" alt=""></td>
                    <td><?= $post['category_name'] ?></td>

                    <td>
                        <a href="<?= route_post ?>/editpost/<?= $post['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= route_post ?>/deletepost/<?= $post['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


</div>
<script>
    CKEDITOR.replace('content_product');
</script>