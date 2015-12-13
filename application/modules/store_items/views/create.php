<h2><?php echo $headline; ?></h2>
<?php 
if (isset($flash)) {
	echo $flash;
}
?>
<?php
echo validation_errors("<p style='color: red'>","</p>");
echo form_open($form_location);
?>
	<table class="table table-striped">
	<tr>
	<td valign="top">Item Name</td>
	<td><?php echo form_input('item_name', $item_name); ?></td>
	</tr>
	<tr>
	<td valign="top">Item Price</td>
	<td><?php echo form_input('item_price', $item_price); ?></td>
	</tr>
	<tr>
	<td valign="top">Item Description</td>
	<td><?php echo form_textarea('item_description', $item_description); ?></td>
	</tr>
	<tr>
	<td valign="top">&nbsp;</td>
	<td><?php echo form_submit('submit', 'Submit'); ?></td>
	</tr>
<?php
echo form_close();
?>




