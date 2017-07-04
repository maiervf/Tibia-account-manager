<?php

namespace App\controllers;

class AccountController {

	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function validateEmail($request, $response, $args) {
		return $this->container->Account->unique('email', $args['email']);
	}

	public function validateUsername($request, $response, $args) {
		return $this->container->Account->unique('name', $args['user']);
	}

	public function showAccounts() {
		$statement = $this->container->db->query("SELECT * FROM accounts");
		return json_encode($statement->fetchAll());
	}

	public function createAccount($request, $response, $args) {
		$postData = $request->getParsedBody();
		$this->container->logger->info(json_encode($postData));
		return $this->container->Account->create($postData);
	}
}


