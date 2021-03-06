<?php

namespace model;

class RegisterModel {

	private $userDAL;

	public function __construct() {
		$this->userDAL = new \model\dal\userDAL();
	}
	
	public function saveUser(\model\User $newUser) {
		$this->userDAL->save($newUser);
	}
}