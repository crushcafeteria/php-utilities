

<?php

/**
 * This file is a sample driver file for php-utilities
 * */

require 'Utilities.php';

$utils = new Utilities();



?>



<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Test Kit</title>

		<!-- Bootstrap CSS -->
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="container">
		<h1 class="text-center">php-utilities | Test Kit</h1>

		<div class="col-md-1 text-center">

			<div class="col-md-12">
				<!-- Place this tag where you want the button to render. -->
				<a aria-label="Follow @crushcafeteria on GitHub" data-count-aria-label="# followers on GitHub" data-count-api="/users/crushcafeteria#followers" data-count-href="/crushcafeteria/followers" data-style="mega" href="https://github.com/crushcafeteria" class="github-button">Follow @crushcafeteria</a>
				<br>

				<br>

				<br>

				<br>
				<br>
			</div>

			<div class="col-md-12">
				<!-- Place this tag where you want the button to render. -->
				<a aria-label="Watch crushcafeteria/php-utilities on GitHub" data-count-aria-label="# watchers on GitHub" data-count-api="/repos/crushcafeteria/php-utilities#subscribers_count" data-count-href="/crushcafeteria/php-utilities/watchers" data-style="mega" data-icon="octicon-eye" href="https://github.com/crushcafeteria/php-utilities" class="github-button">Watch this project</a>
				<br>

				<br>

				<br>

				<br>
				<br>
			</div>

			<div class="col-md-12">
				<!-- Place this tag where you want the button to render. -->
				<a aria-label="Star crushcafeteria/php-utilities on GitHub" data-count-aria-label="# stargazers on GitHub" data-count-api="/repos/crushcafeteria/php-utilities#stargazers_count" data-count-href="/crushcafeteria/php-utilities/stargazers" data-style="mega" data-icon="octicon-star" href="https://github.com/crushcafeteria/php-utilities" class="github-button">Star this project</a>
				<br>

				<br>

				<br>

				<br>
				<br>
			</div>


			<div class="col-md-12">
				<!-- Place this tag where you want the button to render. -->
				<a aria-label="Download crushcafeteria/php-utilities on GitHub" data-style="mega" data-icon="octicon-cloud-download" href="https://github.com/crushcafeteria/php-utilities/archive/master.zip" class="github-button">Download php-utilities</a>
				<br>

				<br>

				<br>

				<br>
				<br>
			</div>

		</div>

		<div class="col-md-offset-2 col-md-6 panel panel-default panel-body">
			
			<legend class="text-center">Message Box</legend>
			<?php 

			echo $utils->msgBox('This is a message box\'s body content', 'Im informant');
			echo $utils->msgBox('This is a message box\'s body content', 'You fucked up!','alert-danger');
			echo $utils->msgBox('This is a message box\'s body content', 'I\'m watching you!','alert-warning');
			echo $utils->msgBox('This is a message box\'s body content', 'Ulala!','alert-success');

			?>


			
			<legend class="text-center">Mini Message Boxes</legend>
			<?php 

			echo $utils->miniBox('This is a message box\'s body content');
			echo $utils->miniBox('This is a message box\'s body content', 'alert-danger');
			echo $utils->miniBox('This is a message box\'s body content', 'alert-warning');
			echo $utils->miniBox('This is a message box\'s body content', 'alert-success');

			?>


			<legend class="text-center">Facebook Time</legend>
			<p class="lead">
				Load php-utilities class whichever way floats your boat
			</p>
			<code>
				$time = '2015-04-20 00:00:00';
				<br>
				$fbTime = $utils->fbTime($time);
				<br>
				<br>
				echo 'Ex: This post was updated $fbTime ago'
			</code>

			<?php 
			$time = '2015-04-20 00:00:00';
			$fbTime = $utils->fbTime($time);
			?>

			<br>
			<br>

			<p class="text-info lead">
				Ex: This post was updated <?=$fbTime?> ago
			</p>

		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

		<!-- Place this tag right after the last button or just before your close body tag. -->
		<script async defer id="github-bjs" src="https://buttons.github.io/buttons.js"></script>
	</body>
</html>