<div class="row">
    <div class="col-sm-12">
        <!-- menus -->
        <div class="navbar navbar-inverse">
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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <?php if(isset($blog_name)) {
                                echo anchor('blogs/'.$blog_name, '<span class="glyphicon glyphicon-home"></span> ブログホーム');
                            }?>
                    </li>
                    <li><?php echo anchor('blogs/', 'このサイトについて'); ?></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">メニュー <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo anchor('articles/create', '<span class="glyphicon glyphicon-pencil"></span> 新規投稿'); ?></li>
                            <li><?php echo anchor('', '<span class="glyphicon glyphicon-user"></span> プロファイル設定'); ?></li>
                            <li><?php echo anchor('users/logout', '<span class="glyphicon glyphicon-log-out"></span> ログアウト'); ?></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>