<?php if(isset($error)) {
    echo $error;
} ?>

<?php if(isset($upload_data)) {
} ?>


<?php echo form_open_multipart('images/do_upload');?>
    <input type="file" name="userfile" size="20" />
    <input type="submit" value="upload" />
</form>