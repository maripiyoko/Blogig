<?php foreach ($comments as $comment): ?>
    <div class="media">
        <div class="pull-left">
            <img data-src="holder.js/64x64" class="img-circle" title="ユーザーアイコン">
        </div>
        <div class="media-body comment">
            <?php echo $this->md->transform($comment->comment); ?>
        </div>
    </div>
<?php endforeach ?>