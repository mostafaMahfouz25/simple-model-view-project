<?php require_once(VIEWS.'inc/header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center p-3">Edit Post</h1>
            </hr> 
            <?php  if(isset($error)) :  ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>
            <?php  if(isset($success)) :  ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <form method="post" action="<?php url('update-post'); ?>">
                <div class="form-group">
                    <label for="post_title">Post Title </label>
                    <input type="hidden" name="post_id" value="<?php echo $row['post_id']; ?>">
                    <input type="text" class="form-control" id="post_title" value="<?php echo $row['post_title']; ?>"  name="post_title">
                </div>
                <div class="form-group">
                    <label for="content">Post Content</label>
                    <textarea name="post_content" id="content" class="form-control"  cols="30" rows="10"><?php echo $row['post_content']; ?></textarea>
                </div>
      
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>


        </div>
    </div>
</div>
    

    

<?php require_once(VIEWS.'inc/footer.php') ?>

