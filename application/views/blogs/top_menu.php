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
                    <li>
                        <?php if(isset($blog_name)) {
                                echo anchor('blogs/'.$blog_name, 'ブログホーム');
                            }?>
                    </li>
                    <li><?php echo anchor('blogs/', 'このサイトについて'); ?></li>
                </ul>
            </div>

        </div>
    </div>
</div>