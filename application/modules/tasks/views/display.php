<h1>Your Tasks</h1>

<?php

echo anchor('tasks/create', '<p>Create New Task</p>');
		
foreach ($query->result() as $row) {
	$edit_url = base_url().'tasks/create/'.$row->id;
	echo "<p>".$row->title." &nbsp; &nbsp; <a href='edit_url'>EDIT</a></p>";
		}
		
		//one method to do this
		echo "<hr>";

		$firstname = "Ed";
		$lastname ="Black";
		$this->load->module('nofun');
		$this->nofun->sayhello($firstname, $lastname);
		
		//second method
		echo "<hr>";
		echo Modules::run('nofun/sayhello', $firstname, $lastname);
?>