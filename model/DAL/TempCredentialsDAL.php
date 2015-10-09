<?php
/**
  * Solution for assignment 2
  * @author Daniel Toll
  */
namespace model;

class TempCredentialsDAL {

	private static $dataFolder = "temp/";

	public function load($userName) {
		if ( file_exists(self::getFileName($userName)) ) {
			$fileContent = file_get_contents(self::getFileName($userName));
			if ($fileContent !== FALSE)
			{
				return unserialize($fileContent);
			}
		}
		return null;
	}

	public function save(LoggedInUser $user, TempCredentials $t) {
		file_put_contents( self::getFileName($user->getUserName()), serialize($t) );
	}

	/**
	 * Creates a filename with complete path. Uses hashed username for unique name.
	 * @param  [string] $userName 
	 * @return [string] filepath as string
	 */
	private function getFileName($userName) {
		return \Settings::DATAPATH . self::$dataFolder . sha1($userName);
	}
}