<div class="row">
    <div class="col-sm-12">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if(isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }?>
        <?php if(isset($success)) {
            echo '<div class="alert alert-success">'.$success.'</div>';
        } ?>
    </div>
</div>