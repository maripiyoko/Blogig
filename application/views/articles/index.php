<div class="row">
    <div class="col-sm-12 articles">
    <?php echo $this->pagination->create_links(); ?>
    <?php foreach ($articles as $item): ?>
        <div class="panel panel-default">
            <div class="title panel-heading"><?php echo $item->title; ?></div>
            <div class="content panel-body"><?php echo $item->content; ?></div>
            <div class="date">作成日 : <?php echo $item->date_created; ?></div>
        </div>
    <?php endforeach ?>
    <?php echo $this->pagination->create_links(); ?>
    </div>
</div>