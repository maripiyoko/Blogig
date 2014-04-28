<?php $this->load->view('templates/preview_header'); ?>
<div id="main" class="col-sm-8 col-sm-pull-4">
    <ul>
    <?php foreach ($blogs as $item): ?>
        <li><?php echo anchor('blogs/'. $item->blog_name,  $item->blog_title) ?></li>
    <?php endforeach ?>
    </ul>
    </div><!-- end of #main -->
</div><!-- end of 3rd row -->
<?php $this->load->view('templates/preview_footer'); ?>