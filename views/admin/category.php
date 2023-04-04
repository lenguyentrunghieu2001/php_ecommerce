<div class="container">
    <h1 class="mt-4 text-center">Add Category</h1>
    <form action="" method="POST">

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
            <label for="exampleInputEmail1" class="form-label">description*</label>
            <textarea class="form-control" id="description_category" aria-describedby="emailHelp" placeholder="placeholer description ..." name="description" cols="30" rows="10"><?= isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
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

    <h1 class="mt-4 text-center">List Category</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">description</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['category'] as $key => $category) {
            ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $category['description'] ?></td>
                    <td><?= $category['name'] ?></td>
                    <td>
                        <a href="<?= route_category ?>/editcategory/<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= route_category ?>/deletecategory/<?= $category['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>


</div>
<script>
    CKEDITOR.replace('description_category');
</script>