<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center p-3">Update Post</h1>
            <?php  if(isset($error)) :  ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>
            <?php  if(isset($success)) :  ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
        </div>
    </div>
</div>
    

    

<?php require_once(VIEWS.'inc/footer.php') ?>

