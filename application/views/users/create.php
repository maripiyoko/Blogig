<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>
<div id="login" class="jumbotron">
<?php echo form_open('users/create', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label class="col-sm-3 control-label" for="user_name">ユーザー名</label>
        <div class="col-sm-7">
        <input class="form-control" type="text" name="user_name" value="<?php echo set_value('user_name'); ?>"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="password">パスワード</label>
        <div class="col-sm-7">
        <input class="form-control" type="password" name="password" value="" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="passconf">パスワードの確認</label>
        <div class="col-sm-7">
        <input class="form-control" type="password" name="passconf" value=""/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="blog_name">ブログ識別名</label>
        <div class="col-sm-7">
        <input class="form-control" type="text" name="blog_name" value="<?php echo set_value('blog_name'); ?>"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label" for="blog_title">ブログタイトル</label>
        <div class="col-sm-7">
        <input class="form-control" type="text" name="blog_title" value="<?php echo set_value('blog_title'); ?>"/>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-7">
            <input type="submit" value="新規作成" class="btn btn-primary btn-lg"/>
        </div>
    </div>
</form>