<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container">
    <h1 class="text-center p-3">Posts Page</h1>
    <a href="<?php url('add-post'); ?>" class="btn btn-primary my-2"> Add New Post </a>
    <div class="row">
        <div class="col-sm-12">
                <table class="table table-dark ">
                    <thead class="text-center">
                        <tr >
                            <th scope="col">#</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                    <?php $index=0; foreach($posts as $post): ?>
                    <?php  $index++ ?>
                        <tr>
                            <th scope="row"><?php echo $index; ?></th>
                            <td><?php echo $post['post_title'];  ?></td>
                            <td> <a href="<?php url('edit-post/'.$post['post_id']); ?>" class="btn btn-info"> Edit </a> </td>
                            <td> <a href="<?php url('delete-post/'.$post['post_id']); ?>" class="btn btn-danger"> Delete </a> </td>
                        </tr>
                    <?php endforeach; ?>
                       
                    </tbody>
                </table>
        </div>
    </div>
</div>
    

    

<?php require_once(VIEWS.'inc/footer.php') ?>

