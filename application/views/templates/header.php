<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title>Blogig</title>
    <meta name="viewport" content="width=device-width"/>
    <?php echo link_tag('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/stylesheets/style.css'); ?>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/marked.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/holder.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/markdown-preview.js"></script>
    <script src="<?php echo base_url(); ?>assets/javascripts/comments.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
    <div class="col-sm-12">
        <h1><?php echo $page_title; ?></h1>
    </div>
</div>
