<div class="preview-title">
    <h2><?php if(isset($title)) { echo $title; } ?></h2>
</div>
<div class="preview-content">
    <?php if(isset($content)) { echo $html = $this->md->transform($content); } ?>
</div>
<?php $this->load->view('articles/footer'); ?>