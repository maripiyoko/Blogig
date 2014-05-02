<!-- side menu -->
<div class="col-sm-4">
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

    <?php if(isset($articles)) {
        $this->load->view('blogs/_side_recent_posts');
    }?>

</div>