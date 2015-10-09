<?php
/**
  * Solution for assignment 2
  * @author Daniel Toll
  */
/**
 * The settings file contains installation specific information
 *
 */
class Settings {


	/**
	 * The app session name allows different apps on the same webhotel to share a virtual session
	 */
	const APP_SESSION_NAME = "LoginLab";

	/**
	 * Path to folder writable by www-data but not accessable by webserver
	 */
	const DATAPATH = "./data/";

	/**
	 * Salt for creating temporary passwords
	 * Should be a random string like "feje3-#GS"
	 */
	const SALT = "12dds%45!2";

	/**
	 * Show errors
	 * boolean true | false
	 */
	const DISPLAY_ERRORS = true;
}
