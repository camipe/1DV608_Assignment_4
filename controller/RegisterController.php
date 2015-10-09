<?php

namespace controller;

require_once("model/RegisterModel.php");
require_once("view/RegisterView.php");


class RegisterController {

	private $view;
	
	public function __construct(\model\RegisterModel $model, \view\RegisterView $view) {
		$this->view = $view;
		$this->model = $model;		
	}

	public function doRegister() {

		if ($this->view->userWantsToRegister()) {
			$newUser = $this->view->getNewUser();
			if ($newUser != null) {
				try {
					$this->model->saveUser($newUser);
					$this->view->registrationSuccess();
				} catch (\model\dal\UserExistsException $e) {
					$this->view->setUserExistsMessage();
				}
			}
		} 
	}
}