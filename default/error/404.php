<?php
/**
 * Sample layout.
 */
use Core\Error;

?>
<?php
/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

	<!-- CSS -->
	<?php
	Assets::css([
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
		'//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
		Url::templatePath().'css/style.css',
		Url::templatePath().'css/bootstrap-wysihtml5.css',
		Url::templatePath().'css/wysiwyg-color.css',
	]);

	//hook for plugging in css
	$hooks->run('css');

	Assets::js([
		Url::templatePath().'js/jquery.js',
		Url::templatePath().'js/wysihtml5-0.3.0.js',
		Url::templatePath().'js/bootstrap-wysihtml5.js',
	]);

	//hook for plugging in javascript
	$hooks->run('js');
	?>

</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>

<div class="container"><br>
	<div class="container content">
		<div class="row">
			<div class="col-md-4 col-md-offset-4 text-center">
				<div class="jumbotron">
					<h1>404</h1>

					<hr />

					<h3 style="font-size: 20px;">Error 404</h3>
					<h3 style="font-size: 16px;">The page you were looking for could not be found!</h3>
					<p style="font-size: 12px;"><?php echo $data['error']; ?></p>
					<a href="<?=$_SERVER['HTTP_REFERER']?>" class="btn btn-primary">Back <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<?php
	/**
	 * Sample layout.
	 */

	//initialise hooks
	$hooks = Hooks::get();
	?>
</div>

<?php
Assets::js([
	'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
]);

//hook for plugging in javascript
$hooks->run('js');
?>
<!-- JS -->
<script type="text/javascript">
	$('#editor').wysihtml5({
		"font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
		"emphasis": true, //Italics, bold, etc. Default true
		"lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
		"html": false, //Button which allows you to edit the generated HTML. Default false
		"link": true, //Button to insert a link. Default true
		"image": true, //Button to insert an image. Default true,
		"color": true //Button to change color of font
	});
</script>
<?php

//hook for plugging in code into the footer
$hooks->run('footer');
?>

</body>
</html>
