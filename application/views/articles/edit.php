<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>
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
            <?php echo anchor("articles/show/".$id, 'キャンセル', array('class' => "btn")); ?>
        </form>
    </div>
    <div class="col-sm-6">
        <?php $this->load->view('articles/preview');?>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>