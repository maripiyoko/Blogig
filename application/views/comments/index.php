<?php foreach ($comments as $comment): ?>
    <div class="media">
        <div class="pull-left">
            <img data-src="holder.js/64x64" class="img-circle" title="ユーザーアイコン">
        </div>
        <div class="media-body comment editable-item">
            <div class="view"><?php echo $this->md->transform($comment->comment); ?></div>
            <div class="form-group edit">
            <?php echo form_open('comments/edit'); ?>
                <?php echo form_hidden('article_id', $id); ?>
                <?php echo form_hidden('comment_id', $comment->id); ?>
                <textarea name="comment" rows="3" class="form-control"><?php echo $comment->comment; ?></textarea>
                <input type="submit" value="保存" class="btn btn-primary">
            </form>
        </div>
        </div>
    </div>
<?php endforeach ?>