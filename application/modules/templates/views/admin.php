<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin Template</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
  </head>
  <body>
    <!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-fire"></span> Admin</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url(); ?>dashboard/home">Dashboard</a></li>
                <li><a href="<?= base_url(); ?>site/about_us">Settings</a></li>
                <li><a href="<?= base_url(); ?>site/contact_us">Stats</a></li>
                <!--<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Tutorials <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= base_url(); ?>tutorials">Codeigniter</a></li>
                        <li><a href="#">Installing XAMP</a></li>
                        <li><a href="#">Installing NotePad ++</a></li>
                        <li role="separator" class="divider"></li>
                        <li class="dropdown-header">Graphic Editers</li>
                        <li><a href="#">Installing Inkscape</a></li>
                        <li><a href="#">Installing GIMP</a></li>
                    </ul>
                </li>
            </ul> -->
        </div>
        <!--/.nav-collapse -->
    </div>
</nav> 
 <div class="container container-top">
	<div class="row">
    <h1>Admin Dashboard</h1>
	<?php
	if (!isset($module)){
		$module = $this->uri->segment(1);
	}	
	if (!isset($view_file)) {
		$view_file = $this->uri->segment(2);
	}	
	if (($module!="") && ($view_file!="")) {
		$path = $module."/".$view_file;
		$this->load->view($path);
	}	
	?>
	</div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>