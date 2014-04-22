<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>
<div class="row">
    <div id="main" class="col-sm-12">
        <div id="login" class="jumbotron">
            <?php echo form_open('users/login') ?>
                <div class="form-group">
                    <label for="user_name">ユーザー名</label>
                    <input class="form-control" type="input" name="user_name"/>
                </div>
                <div class="form-group">
                    <label for="password">パスワード</label>
                    <input class="form-control" type="password" name="password"/>
                </div>
                <input class="btn btn-primary"
                    type="submit" name="submit" value="ログイン" />
            </form>
        </div>
    </div>
</div>
<?php $this->load->view('templates/footer'); ?>