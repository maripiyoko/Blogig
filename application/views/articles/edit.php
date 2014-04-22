<div class="row">
    <div class="col-sm-12">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if(isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('articles/update') ?>
            <?php echo form_hidden('id', $id); ?>
            <div class="form-group">
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label for="content">記事</label>
                <textarea class="form-control" name="content" id="content" rows="20"><?php echo $content; ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="保存">
            <input type="button" class="btn" value="キャンセル">
        </form>
    </div>
</div>