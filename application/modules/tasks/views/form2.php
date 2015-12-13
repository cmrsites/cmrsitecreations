<?php echo validation_errors(); ?>

<?php echo form_open('tasks/submit'); ?>

<h5>Title</h5>
<input type="text" name="title" value="" size="20" />

<h5>Priority</h5>
<input type="text" name="priority" value="" size="20" />

<div><br /><input type="submit" value="Submit" /></div>
 


</form>
