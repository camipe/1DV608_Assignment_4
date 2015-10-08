<?php 

namespace model;

class UsernameAndPasswordMissingException extends \Exception {};
class ShortUsernameException extends \Exception {};
class ShortPasswordException extends \Exception {};
class InvalidCharException extends \Exception {};

class User {

	private $username;
	private $password;

	public function __construct($username, $password) {
		
		if (mb_strlen($username) < 1 && mb_strlen($password) < 6) {
			throw new UsernameAndPasswordMissingException();
		}

		if (mb_strlen($username) < 3) {
			throw new ShortUsernameException();
		}

		$this->username = $username;

		if (mb_strlen($password) < 6) {
			throw new ShortPasswordException();
		}
		$this->password = $password;
	}
}