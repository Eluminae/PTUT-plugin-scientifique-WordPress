<?php if(!empty($label)) : ?>
	<label>
<?php endif; ?>
<textarea 
	name='<?php echo esc_attr($name)?>'
	placeholder='<?php echo esc_attr($placeholder)?>' 
	<?php if($required) echo 'data-parsley-required="true"'; ?>
	class="contact-area"
	></textarea>
<?php if(!empty($label)) : echo $label ?>
	</label>
<?php endif; ?>