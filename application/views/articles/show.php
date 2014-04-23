<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>
<div class="row">
    <div class="col-sm-6">
        <?php $this->load->view('articles/preview');?>
    </div>
    <div class="col-sm-6">
        <h2>コメント一覧</h2>
        <div class="editable-item">
            <div class="view">
                <a href="#">コメントを追加する</a>
            </div>
            <?php $this->load->view('comments/create');?>
        </div>
        <div id="comments">
            <?php $this->load->view('comments/index');?>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>