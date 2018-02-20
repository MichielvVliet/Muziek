<!DOCTYPE html>
<html>
	<head>
		<link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
		<script src="/assets/js/history.js"></script> 
		<title><?= $this->siteTitle(); ?></title>
	</head>
	<body>
		<div class="wrapper">
			<?php include_once ("header.php"); ?>
			<?php include_once ("sidebar.php"); ?>
			<div class="box content">
				<?= $this->content ('body'); ?>
			</div>
		</div>
		<div class="box footer">Footer</div>
	</body>
</html>
