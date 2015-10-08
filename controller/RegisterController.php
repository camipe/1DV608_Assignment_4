<?php

namespace controller;

require_once("model/RegisterModel.php");
require_once("view/RegisterView.php");


class RegisterController {

	private $view;
	
	public function __construct(\view\RegisterView $view) {
		$this->view = $view;		
	}

	public function doRegister() {

		if ($this->view->userWantsToRegister()) {
			$newUser = $this->view->getNewUser();
			var_dump($newUser);
			// TODO: Implement DAL
		} 
	}
}