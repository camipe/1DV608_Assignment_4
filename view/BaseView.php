<?php

namespace view;

abstract class BaseView {

	abstract function render();

	public function getUserClient() {
		return new \model\UserClient($_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_USER_AGENT"]);
	}
}	
