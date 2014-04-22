<div class="row">
    <div class="col-sm-12">
        <?php if(isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }?>
        <?php if(isset($success)) {
            echo '<div class="alert alert-success">'.$success.'</div>';
        }?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('articles/create') ?>
            <input type="submit" class="btn btn-primary" value="新しい記事を作成する">
        </form>
    </div>
</div>