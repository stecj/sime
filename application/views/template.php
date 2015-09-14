<!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= __($site_title) ?></title>

	<?= $styles ?>

</head>

<body class="<?= $bodyClass ?>">

	<div id="wrapper">

		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			
			<?= $header ?>
			
			<?= $navbar ?>
			
		</nav>
		
		<?= $content ?>
		
		<?= $footer ?>

	</div>
	<!-- /#wrapper -->

	<?= $scripts ?>

</body>

</html>
