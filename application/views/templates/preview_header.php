<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title>
        <?php if(isset($page_title)) {
            echo $page_title;
        } else {
            echo 'Welcome to Blogig';
        } ?>
    </title>
    <meta name="viewport" content="width=device-width"/>
    <?php echo link_tag('assets/vendor/bootstrap/themes/bootstrap.css'); ?>
    <?php echo link_tag('assets/stylesheets/style.css'); ?>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/holder.js"></script>

    <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
    <link rel="Shortcut Icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/favicon.ico">
</head>
<body>
    <?php $this->load->view('blogs/top_menu'); ?>
    <div class="container">

    <div class="row">
        <div id="header" class="col-sm-12">
            <h1>
                <?php if(isset($page_title)) {
                    echo $page_title;
                }?>
            </h1>
        </div>
    </div>

    <!-- start of 3rd row -->
    <div class="row">