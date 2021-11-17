<html>
<head>
	<title><?php echo $title ?></title>
</head>
<body>
<body>
<h1>Hello APSL!</h1>
<a href="<?php echo $router->generate('home') ?>"></a>
<a href="<?php echo $router->generate('body') ?>">BODY Page</a>
<a href="<?php echo $router->generate('article', ['id' => 2]) ?>">Article Page</a>
<?php echo $content ?>
</body>
</body>
</html>