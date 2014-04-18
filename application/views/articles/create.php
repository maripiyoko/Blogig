<div class="row">
    <div class="col-sm-12">
        <?php echo form_open('articles/create') ?>
            <div class="form-group">
                <label for="title">タイトル</label>
                <input class="form-control" type="text" name="title" >
            </div>
            <div class="form-group">
                <label for="content">記事</label>
                <textarea class="form-control" name="content" id="content" rows="20"></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="作成">
            <input type="button" class="btn" value="キャンセル">
        </form>
    </div>
</div>