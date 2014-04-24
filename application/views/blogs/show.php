<h2><?php echo $individual->title; ?></h2>
<div class="time-header pull-right">
    記事公開日 : <?php echo $individual->date_published; ?>
</div>
<div class="preview-article">
    <?php echo $this->md->transform($individual->content); ?>
</div>