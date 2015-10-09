<?php

namespace view;

abstract class BaseView {

	abstract function render();

	/**
	 * This name is used in session
	 * @var string
	 */
	protected static $sessionSaveLocation = "\\view\\message";
	protected static $sessionUsernameSaveLocation = "\\model\\username";


	public function getUserClient() {
		return new \model\UserClient($_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_USER_AGENT"]);
	}

	protected function redirect($message) {
		$_SESSION[self::$sessionSaveLocation] = $message;
		$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header("Location: $actual_link");
	}

	protected function redirectWithUsername($username, $message) {
		$_SESSION[self::$sessionUsernameSaveLocation] = $username;
		$_SESSION[self::$sessionSaveLocation] = $message;
		$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header("Location: $actual_link");
	}

	protected function getSessionMessage() {
		if (isset($_SESSION[self::$sessionSaveLocation])) {
			$message = $_SESSION[self::$sessionSaveLocation];
			unset($_SESSION[self::$sessionSaveLocation]);
			return $message;
		}
		return "";
	}
}	
