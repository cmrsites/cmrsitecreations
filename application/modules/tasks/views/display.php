<h1>Your Tasks</h1>

<?php
foreach ($query->result() as $row) {
			echo "<h3>".$row->title."</h3>";
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