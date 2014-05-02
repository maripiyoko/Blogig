<?php $this->load->view('templates/preview_header'); ?>

    <div id="main" class="col-sm-8">
        <?php if(isset($individual)) {
            $this->load->view('blogs/show');
        } else {
            $this->load->view('blogs/thums');
        } ?>
    </div>

<?php $this->load->view('templates/preview_footer'); ?>