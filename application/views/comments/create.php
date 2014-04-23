<div class="form-group edit">
    <?php echo form_open('comments/create'); ?>
        <?php echo form_hidden('article_id', $id); ?>
        <textarea name="comment" rows="3" class="form-control"></textarea>
        <input type="submit" value="追加" class="btn btn-primary">
    </form>
</div>