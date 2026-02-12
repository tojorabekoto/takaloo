<?php

namespace app\controllers;

use Flight;
use flight\Engine;
use app\models\ChaufferModel;

class ApiExampleController
{

	protected Engine $app;

	public function __construct($app)
	{
		$this->app = $app;
	}

	public function getUsers()
	{
		// You could actually pull data from the database if you had one set up
		// $users = $this->app->db()->fetchAll("SELECT * FROM users");
		$users = [
			['id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com'],
			['id' => 2, 'name' => 'Bob Smith', 'email' => 'bsmith@example.com'],
			['id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com'],
		];

		// You actually could overwrite the json() method if you just wanted to
		// to ->json($users); and it would auto set pretty print for you.
		// https://flightphp.com/learn#overriding
		$this->app->json($users, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function getUser($id)
	{
		// You could actually pull data from the database if you had one set up
		// $user = $this->app->db()->fetchRow("SELECT * FROM users WHERE id = ?", [ $id ]);
		$users = [
			['id' => 1, 'name' => 'Bob Jones', 'email' => 'bob@example.com'],
			['id' => 2, 'name' => 'Bob Smith', 'email' => 'bsmith@example.com'],
			['id' => 3, 'name' => 'Suzy Johnson', 'email' => 'suzy@example.com'],
		];
		$users_filtered = array_filter($users, function ($data) use ($id) {
			return $data['id'] === (int) $id;
		});
		if ($users_filtered) {
			$user = array_pop($users_filtered);
		}
		$this->app->json($user, 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}

	public function updateUser($id)
	{
		// You could actually update data from the database if you had one set up
		// $statement = $this->app->db()->runQuery("UPDATE users SET email = ? WHERE id = ?", [ $this->app->data['email'], $id ]);
		$this->app->json(['success' => true, 'id' => $id], 200, true, 'utf-8', JSON_PRETTY_PRINT);
	}


	public function getChauffer()
{
    $chaufferModel = new ChaufferModel(Flight::db());
    $chauffeurs = $chaufferModel->getChauffer(); // tableau

    Flight::render('chauffeur', [
        'chauffeurs' => $chauffeurs
    ]);
}

public function getVehicules()
{
    $vehiculesModel = new ChaufferModel(Flight::db());
    $vehicules =  $vehiculesModel ->getVehicules(); // tableau

    Flight::render('vehicules', [
        'vehicules' => $vehicules
    ]);
}

public function getSalaires()
{
    $chaufferModel = new ChaufferModel(Flight::db());
    $salaires = $chaufferModel->getSalaires();
    $this->app->render('salaires', ['salaires' => $salaires]);
}

public function getVoiturePanne()
{
    $chaufferModel = new \app\models\ChaufferModel($this->app->db());
    $pannes = $chaufferModel->getVoiturePanne();
    $this->app->render('pannes', ['pannes' => $pannes]);
}

public function getSalaireMin()
{
    $chaufferModel = new \app\models\ChaufferModel($this->app->db());
    $salaireMin = $chaufferModel->getSalaireMin();
    $this->app->render('salaire_min', ['salaireMin' => $salaireMin]);
}

public function getTrajets()
{
    $chaufferModel = new \app\models\ChaufferModel($this->app->db());
    $trajets = $chaufferModel->getTrajets();
    $this->app->render('trajet', ['trajets' => $trajets]);
}

}
