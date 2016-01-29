<input 
	type="submit"
	value="<?php echo isset($label) && $label !== '' ? $label : 'Submit' ?>"
	class="button-<?php echo $location === 'footer' ? '1' : '2' ?>"
	data-sending='<?php _e('Sending','sevenfold') ?>'
	data-sent='<?php _e('Message Successfully sent','sevenfold') ?>'
	>