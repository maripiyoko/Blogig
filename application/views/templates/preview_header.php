<!doctype html>
<html lang="ja">
<head>
    <meta charset="UTF-8" />
    <title><?php echo $page_title ?></title>
    <meta name="viewport" content="width=device-width"/>
    <?php echo link_tag('assets/vendor/bootstrap/themes/bootstrap.min.css'); ?>
    <?php echo link_tag('assets/vendor/bootstrap/themes/bootstrap-theme.min.css'); ?>
    <?php echo link_tag('assets/stylesheets/style.css'); ?>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-1.11.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <div class="row">
        <div id="header" class="col-sm-12">
            <h1><?php echo $page_title ?></h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <!-- menus -->
            <div class="menu navbar navbar-inverse">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle"
                        data-toggle="collapse"
                        data-target=".navbar-collapse">
                        <span class="sr-only">メニュー</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="#">ホーム</a></li>
                        <li><a href="#">ニュースを投稿</a></li>
                        <li><a href="#">このサイトについて</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <!-- side menu -->
        <div class="col-sm-4 col-sm-push-8">
            <div id="category" class="menu panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CATEGORIES</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#">トピックス</a></li>
                        <li><a href="#">国際ニュース</a></li>
                        <li><a href="#">国内ニュース</a></li>
                        <li><a href="#">テクノロジー</a></li>
                        <li><a href="#">エンタメ</a></li>
                        <li><a href="#">テレビ</a></li>
                    </ul>
                </div>
            </div>
            <div id="recent" class="menu panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">RECENT POSTS</h3>
                </div>
                <div class="panel-body">
                </div>
            </div>
        </div>
        <div id="main" class="col-sm-8 col-sm-pull-4">

