<?php $this->load->view('templates/preview_header'); ?>
    <div id="main" class="col-sm-8 col-sm-pull-4">
        <?php if(isset($individual)) {
            $this->load->view('blogs/show');
        } else {
            $this->load->view('blogs/thums');
        } ?>
    </div><!-- end of #main -->
</div><!-- end of 3rd row -->

<?php $this->load->view('templates/preview_footer'); ?>