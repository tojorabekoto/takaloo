<?php

use app\controllers\ApiExampleController;
use app\middlewares\SecurityHeadersMiddleware;
use app\models\ChaufferModel;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */
$chaufferModel = new ChaufferModel(Flight::db());

// This wraps all routes in the group with the SecurityHeadersMiddleware
$router->group('', function (Router $router) use ($app) {

	$router->get('/', function () use ($app) {
		$chaufferModel = new \app\models\ChaufferModel($app->db());

		$chauffeurs = $chaufferModel->getChauffer();
		$vehicules = $chaufferModel->getVehicules();
		$salaires = $chaufferModel->getSalaires();
		$pannes = $chaufferModel->getVoiturePanne();

		$app->render('index', [
			'chauffeurs' => $chauffeurs,
			'vehicules' => $vehicules,
			'salaires' => $salaires,
			'pannes' => $pannes
		]);
	});

	$router->get('/route-iray', function () use ($app) {
		echo 'route iray ve!</h1>';
	});

	$router->get('/hello-world/@name', function ($name) {
		echo '<h1>Hello world! Oh hey ' . $name . '!</h1>';
	});

	$router->get('/api/chauffeurs', [ApiExampleController::class, 'getChauffer']);
}, [SecurityHeadersMiddleware::class]);

$router->get('/vehicules', function () use ($chaufferModel) {
	$vehicules =  $chaufferModel->getVehicules(); // tableau

	Flight::render('vehicules', [
		'vehicules' => $vehicules
	]);
});

$router->group('/api', function () use ($router, $app) {
	$router->get('/chauffeurs', function () use ($app) {
		$chaufferModel = new \app\models\ChaufferModel($app->db());
		$chauffeurs = $chaufferModel->getChauffer();
		$app->render('chauffeur', ['chauffeurs' => $chauffeurs]);
	});

	$router->get('/vehicules', function () use ($app) {
		$chaufferModel = new \app\models\ChaufferModel($app->db());
		$vehicules = $chaufferModel->getVehicules();
		$app->render('vehicules', ['vehicules' => $vehicules]);
	});

	$router->get('/salaires', function () use ($app) {
		$chaufferModel = new \app\models\ChaufferModel($app->db());
		$salaires = $chaufferModel->getSalaires();
		$app->render('salaires', ['salaires' => $salaires]);
	});

	$router->get('/pannes', function () use ($app) {
		$chaufferModel = new \app\models\ChaufferModel($app->db());
		$pannes = $chaufferModel->getVoiturePanne();
		$app->render('pannes', ['pannes' => $pannes]);
	});
});
