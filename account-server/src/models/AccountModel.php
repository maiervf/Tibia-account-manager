<?php

namespace App\models;

class AccountModel
{

	protected $container;

	// constructor receives container instance
	public function __construct($container)
	{
		$this->container = $container;
	}

	public function get($field, $value)
	{
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

	public function save($data)
	{
		// not implemented yet
	}
}


