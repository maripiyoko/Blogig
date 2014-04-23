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
        <div class="article well">
            <div class="title">
                <div class="article-title">
                    <?php echo anchor("articles/show/".$item->id, $item->title, array('title' => "記事の詳細ページへ")); ?>
                    <?php if($item->num_comments > 0) {
                        echo '<div class="comment badge">'.$item->num_comments.' comments</div>';
                    } ?>
                </div>

            </div>
            <div class="content">
                <?php echo $html = $this->md->transform($item->content); ?>
            </div>
            <div class="date">作成日 : <?php echo $item->date_created; ?></div>
            <?php echo form_open('articles/delete') ?>
                <?php echo form_hidden('id', $item->id) ?>
                <button type="submit" class="delete btn btn-danger btn-xs">削除</button>
            </form>
        </div>
    <?php endforeach ?>
    <?php echo $this->pagination->create_links(); ?>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>