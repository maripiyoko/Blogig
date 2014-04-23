<div class="form-group edit">
    <?php echo form_open('comments/create'); ?>
        <?php echo form_hidden('article_id', $id); ?>
        <textarea name="comment" rows="3" class="form-control"></textarea>
    </form>
</div>