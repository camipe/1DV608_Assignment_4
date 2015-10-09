<?php

namespace model\dal;

class UserExistsException extends \Exception {};

class UserDAL {

	private static $dataFolder = "users/";

	public function loadUser($userName) {
		if ( file_exists($this->getFileName($userName)) ) {
			$fileContent = file_get_contents($this->getFileName($userName));
			if ($fileContent !== FALSE)
			{
				return unserialize($fileContent);
			}

		}

		return null;
	}

	public function save(\model\User $user) {
		if (file_exists($this->getFileName($user->getUserName()))) {
			throw new UserExistsException();
		}
		file_put_contents($this->getFileName($user->getUserName()), serialize($user) );
	}

	/**
	 * Creates a filename with complete path. Uses hashed username for unique name.
	 * @param  [string] $userName 
	 * @return [string] filepath as string
	 */
	private function getFileName($userName) {
		return \Settings::DATAPATH  . self::$dataFolder . sha1($userName);
	}
}