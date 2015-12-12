<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>One Column Template</title>

    <!-- Bootstrap -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-fire"></span> CMRSites</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li><a href="<?= base_url(); ?>site/about_us">About Us</a></li>
                <li><a href="<?= base_url(); ?>site/contact_us">Contact Us</a></li>
                <li class="dropdown">
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
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav> 
<div class="container container-top"><!-- Main Container -->
    <div class="row"><!-- Main Row -->

 <h2>One column template</h2>
<?php 
	$this->load->view($module.'/'.$view_file);
	?>
    </div>
    <!-- End Main Row -->
</div>
<!-- End Main Container -->

<footer class="footer">
    <div class="container">
        Welcome to our website. If you continue to browse and use this website, you are agreeing to
        comply with and be bound by the following terms and conditions of use, which together with our privacy policy
        govern CMRSiteCreations, LLC's relationship with you in relation to this website. If you disagree with any part
        of these terms and conditions, please do not use our website. <a
            href="http://localhost/abc-membership-site/terms">Terms & Conditions</a><br/>

        <div class="text-center">Copyright 2015. This site is owned & maintained by CMRSiteCreations, LLC All Rights
            Reserved.
        </div>
    </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
  </body>
</html>