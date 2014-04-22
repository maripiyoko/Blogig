<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>
<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('articles/create') ?>
            <input type="submit" class="btn btn-primary" value="新しい記事を作成する">
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 articles">
    <?php echo $this->pagination->create_links(); ?>
    <?php foreach ($articles as $item): ?>
        <div class="panel panel-default">
            <div class="title panel-heading">
                <?php echo anchor("articles/show/".$item->id, $item->title, array('title' => "記事を編集")); ?>
                <?php echo form_open('articles/delete') ?>
                    <?php echo form_hidden('id', $item->id) ?>
                    <button type="submit" class="delete btn btn-danger">削除</button>
                </form>
            </div>
            <div class="content panel-body">
                <?php echo $html = $this->md->transform($item->content); ?>
            </div>
            <div class="date">作成日 : <?php echo $item->date_created; ?></div>
        </div>
    <?php endforeach ?>
    <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>