<?php

namespace App\controllers;

class LoginController {

	protected $container;

	public function __construct($container) {
		$this->container = $container;
	}

	public function login($request, $response, $args) {
		$postData = $request->getParsedBody();
		$this->container->logger->info(json_encode($request));
		if (empty($postData['name']) || empty($postData['password'])) {
			return json_encode(['valid' => false, 'msg' => 'Account or Password not sended.']);
		}

		$account = $this->container->Account->loginValid($postData['name'], $postData['password']);
        
        if (empty($account)) {
        	return json_encode(['valid' => false, 'msg' => 'Login invalid.']);
        }

        $data['user'] = $postData['name'];
        $data['token'] = bin2hex(openssl_random_pseudo_bytes(12));
        // $data['token'] = '1223';
        $this->container->logger->info(json_encode($data));
		$this->container->Account->updateAccountToken($data);
        return json_encode($data);
    }
}