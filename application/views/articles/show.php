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
        <div class="preview-title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="preview-content">
            <?php echo $html = $this->md->transform($content); ?>
        </div>
    </div>
    <div class="col-sm-6">
        <h2>コメント一覧</h2>
        <a id="add_comment" href="#">
            <span>コメントを追加する</span>
            <span style="display:none;">やめる</span>
        </a>
        <div id="comments">
            <div id="new_comment" class="form-group">
            <?php echo form_open('comments/create'); ?>
                <?php echo form_hidden('article_id', $id); ?>
                <textarea name="comment" rows="5" class="form-control"></textarea>
                <input type="submit" value="追加" class="btn btn-primary">
            </form>
            </div>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <?php echo $comment->comment; ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>