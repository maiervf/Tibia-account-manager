<?php

namespace App\controllers;

class LoginController {

	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function login($request, $response, $args) {
		if (empty($request['name']) || empty($request['password'])) {
			return json_encode(['valid' => false, 'msg' => 'Account or Password not sended.']]);
		}

		$account = $this->container->Account->loginValid($request['name'], $request['password']);
        
        if (empty($account)) {
        	return json_encode(['valid' => false, 'msg' => 'Login invalid.']]);
        }

        $data['user'] = $request['name'];
        $data['token'] = bin2hex(openssl_random_pseudo_bytes(12));

		$this->container->Account->updateAccountToken($data);
        return json_encode($data);
    }
}