<div class="my_meta_control">
	<p>
		<?php $mb->the_field('summary'); ?>
		<div class="wp-editor-wrap attachments-field-wysiwyg-editor-wrap">
            <div class="wp-editor-container">
		<textarea id="summary-text" class="wp-editor-area  attachments-field-wysiwyg" name="<?php $mb->the_name(); ?>" rows="3"><?php $mb->the_value(); ?></textarea>
		</div>
		</div>
	</p>
	<input type="submit" class="button-primary" name="save" value="Save">
</div>