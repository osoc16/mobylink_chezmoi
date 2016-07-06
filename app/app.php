<?php

// Bootstrap
require __DIR__ . DIRECTORY_SEPARATOR . 'bootstrap.php';

$app->error(function (\Exception $e, $code) use ($app) {
	if ($code == 404) {
		return $app['twig']->render('errors/404.twig', array('error' => $e->getMessage()));
	} else {
                return $app['twig']->render('errors/404.twig', array('error' => $e->getMessage()));
	}
});

// Define routes for our static pages
$pages = array(
	'/test' => 'test'
);
foreach ($pages as $route => $view) {
	$app->get($route, function () use ($app, $view) {
		return $app['twig']->render('static/' . $view . '.twig');
	})->bind($view);
}

// Mount our controllers (dynamic routes)
// @note: in essence nothing has changed to our controllers, except for binding a name to the route
$app->mount('/', new ChezMoi\Provider\Controller\HomeController());
