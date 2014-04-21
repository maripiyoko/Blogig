<div class="row">
    <div class="col-sm-12 articles">
    <?php echo $this->pagination->create_links(); ?>
    <?php foreach ($articles as $item): ?>
        <div class="panel panel-default">
            <div class="title panel-heading">
                <?php echo anchor("articles/edit/".$item->id, $item->title, array('title' => "記事を編集")); ?>
                <?php echo form_open('articles/delete') ?>
                    <?php echo form_hidden('id', $item->id) ?>
                    <button type="submit" class="delete btn btn-danger">削除</button>
                </form>
            </div>
            <div class="content panel-body">
                <?php echo $html = $this->md->defaultTransform($item->content); ?>
            </div>
            <div class="date">作成日 : <?php echo $item->date_created; ?></div>
        </div>
    <?php endforeach ?>
    <?php echo $this->pagination->create_links(); ?>
    </div>
</div>