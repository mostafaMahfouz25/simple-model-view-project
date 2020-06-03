<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center p-3">Edit Post</h1>
            </hr> 
            <div class="card my-3">
                <div class="card-body">
                     <h3> <?php echo $row['post_title']; ?> </h3>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body">
                    <h3> <?php echo $row['cat_name']; ?> </h3>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body">
                    <p> <?php echo $row['post_content']; ?> </p>
                </div>
            </div>


        </div>
    </div>
</div>
    

    

<?php require_once(VIEWS.'inc/footer.php') ?>

