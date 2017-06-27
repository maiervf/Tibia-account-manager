<?php

namespace App\controllers;

class AccountController
{

	protected $container;

	// constructor receives container instance
	public function __construct($container)
	{
		$this->container = $container;
	}

	public function validateEmail($request, $response, $args)
	{
		return $this->container->Account->unique('email', $args['email']);
	}

	public function validateUsername($request, $response, $args)
	{
		return $this->container->Account->unique('name', $args['user']);
	}

	public function showAccounts() {
		$statement = $this->container->db->query("SELECT * FROM accounts");
		return json_encode($statement->fetchAll());
	}

	public function createAccount($request, $response, $args)
	{
		// not implemented yet
		// $postData = $request->getParsedBody();		
		// foreach($postData as $key => $param) {
		// 	// Arrange the data for save
		// }
		$this->container->renderer->render($response, 'index.phtml');
	}
}


