<?php foreach ($articles as $item): ?>
    <div class="col-sm-12 col-md-6">
        <h3><?php echo anchor('blogs/'.$blog_name.'/'.$item->digest, $item->title) ?></h3>
        <img class="img-responsive" data-src="holder.js/400x200">
        <div class="preview-thum-content">
            <?php echo $this->md->transform($item->content); ?>
        </div>
        <div class="time-header pull-right">
            記事公開日 : <?php echo $item->date_published; ?>
        </div>
    </div>
<?php endforeach ?>