<div id="recent" class="menu panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">RECENT POSTS</h3>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
        <?php foreach ($articles as $item): ?>
            <li><?php echo anchor('blogs/'.$blog_name.'/'.$item->digest, $item->title) ?></li>
        <?php endforeach ?>
        </ul>
    </div>
</div>