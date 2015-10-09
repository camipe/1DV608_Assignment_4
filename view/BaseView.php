<?php

namespace view;

abstract class BaseView {

	abstract function render();

	/**
	 * This name is used in session to store messages
	 * @var string
	 */
	protected static $sessionSaveLocation = "\\view\\message";
	/**
	 * This name is used in session to store usernames
	 * @var string
	 */
	protected static $sessionUsernameSaveLocation = "\\model\\username";


	public function getUserClient() {
		return new \model\UserClient($_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_USER_AGENT"]);
	}

	/**
	 * Redirects with a message saved in session
	 * @param  [string] $message 
	 * @return void
	 */
	protected function redirect($message) {
		$_SESSION[self::$sessionSaveLocation] = $message;
		$actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		header("Location: $actual_link");
	}

	/**
	 * Redirects with a username and a message saved in session
	 * @param  [string] $username
	 * @param  [string] $message 
	 * @return [void]
	 */
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
