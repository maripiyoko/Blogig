<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title>Blogig</title>
    <meta name="viewport" content="width=device-width"/>
    <?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.css'); ?>
    <?php echo link_tag('assets/stylesheets/style.css'); ?>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/marked.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/holder.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/common.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/markdown-preview.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/editable.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/form_check.js"></script>
    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
</head>
<body>
    <?php $this->load->view('articles/top_menu'); ?>
    <div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if(isset($page_title)) {
                echo '<h1>'.$page_title.'</h1>';
            }?>
        </div>
    </div>
</div>
