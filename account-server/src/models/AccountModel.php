<?php

namespace App\models;

class AccountModel {

	protected $container;

	// constructor receives container instance
	public function __construct($container) {
		$this->container = $container;
	}

	public function get($field, $value) {
		$baseQuery = "SELECT * FROM accounts WHERE {$field} = :value";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->bindValue(':value', $value);
		$statement->execute();
		return $statement->fetchAll();
	}

	public function unique($field, $value) {
		$baseQuery = "SELECT COUNT(*) AS not_unique FROM accounts WHERE {$field} = :value";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->bindValue(':value', $value);
		$statement->execute();
		$result = $statement->fetch();
		return $result['not_unique'];
	}

	public function create($data) {
		$baseQuery = "INSERT INTO accounts(name, email, password, creation) values (?, ?, ?, NOW())";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->execute([$data['name'], $data['email'], sha1($data['password'])]);
		return '1';
	}

	public function loginValid($user, $pass) {
		$baseQuery = "SELECT * FROM accounts WHERE name = :user AND password = :password";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->bindValue(':user', $user);
		$statement->bindValue(':password', sha1($pass));
		$statement->execute();
		return $statement->fetch();
	}

	public function validateToken($token) {
		$baseQuery = "SELECT * FROM accounts WHERE token = :value AND token_expiration_time > NOW()";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->bindValue(':value', $token);
		$statement->execute();
		return $statement->fetch();	
	}

	public function updateAccountToken($data) {
		$baseQuery = "UPDATE accounts SET token = :token, token_expiration_time = :expirationTime WHERE name = :username";
		$statement = $this->container->db->prepare($baseQuery);
		$statement->bindValue(':token', $data['token']);
		$statement->bindValue(':username', $data['name']);
		$statement->bindValue(':expirationTime', date('Y-m-d H:i:s', strtotime('+1 hour')));
		$statement->execute();
	}
}


