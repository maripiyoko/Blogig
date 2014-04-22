<div class="row">
    <div class="col-sm-12">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if(isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php echo form_open('articles/update') ?>
            <?php echo form_hidden('id', $id); ?>
            <div class="form-group">
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title" id="title" value="<?php echo $title; ?>">
            </div>
            <div class="form-group">
                <label for="content">記事</label>
                <textarea class="form-control" name="content" id="content" rows="20"><?php echo $content; ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="保存">
            <?php echo anchor("articles/index/", 'キャンセル', array('class' => "btn")); ?>
        </form>
    </div>
    <div class="col-sm-6">
        <div class="preview-title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="preview-content">
            <?php echo $html = $this->md->transform($content); ?>
        </div>
    </div>
</div>