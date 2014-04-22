<div class="row">
    <div class="col-sm-12">
        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
        <?php if(isset($error)) {
            echo '<div class="alert alert-danger">'.$error.'</div>';
        }?>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <?php $this->load->view('articles/preview');?>
    </div>
    <div class="col-sm-6">
        <h2>コメント一覧</h2>
        <a id="add_comment" href="#">
            <span>コメントを追加する</span>
            <span class="other">やめる</span>
        </a>
        <div id="comments">
            <?php $this->load->view('comments/create');?>
            <?php $this->load->view('comments/index');?>
        </div>
    </div>
</div>