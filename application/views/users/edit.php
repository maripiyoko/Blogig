<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('shared/error');?>

<?php echo form_open_multipart('users/edit');?>
    <div class="form-group">
        <label class="control-label" for="user_name">ユーザー名</label>
        <input class="form-control check_unique"
            type="text" name="user_name"
            disabled
            value="<?php echo $user_name; ?>"/>
    </div>
    <div class="form-group">
        <label for="userfile">アイコン画像</label>
        <input class="form-control" type="file" name="userfile"/>
    </div>
    <div>
        <?php if(isset($user_image)) {
            echo '<img src="'.$user_image.'" alt="">';
        } ?>
    </div>
    <button type="submit" class="btn btn-primary">更新</button>
</form>
<?php $this->load->view('templates/footer'); ?>