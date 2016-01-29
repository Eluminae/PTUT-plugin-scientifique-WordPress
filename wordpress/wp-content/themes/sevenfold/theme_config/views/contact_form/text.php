<?php if(!empty($label)) : ?>
	<label>
<?php endif; ?>
<input 
	type='text' 
	name='<?php echo esc_attr($name)?>' 
	placeholder='<?php echo esc_attr($placeholder)?>' 
	value=''
	<?php if($required) echo 'data-parsley-required="true"'; ?>
	class="contact-line"
	>
<?php if(!empty($label)) : echo $label?>
	</label>
<?php endif; ?>