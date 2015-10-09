<?php

namespace view;

class PasswordsNoMatchException extends \Exception {};

class RegisterView extends BaseView {

	/**
	 * These names are used in $_POST
	 * @var string
	 */	
	private static $register = "RegisterView::Register";
	private static $username = "RegisterView::UserName";
	private static $password = "RegisterView::Password";
	private static $rptPassword = "RegisterView::PasswordRepeat";
	private static $messageID = "RegisterView::Message";

	public $message = "";

	public function userWantsToRegister() {
		return isset($_POST[self::$register]);	
	}


	private function getUserName() {
		if (isset($_POST[self::$username]))
			return trim($_POST[self::$username]);
	}

	private function getPassword() {
		if ($this->checkPasswordMatch() == true) {
			return trim($_POST[self::$password]);
		}
	}

	private function checkPasswordMatch() {
		if (isset($_POST[self::$password]) && $_POST[self::$password] == $_POST[self::$rptPassword]) {
			return true;
		} else {
			throw new PasswordsNoMatchException();			
		}
	}

	public function setUserExistsMessage() {
		$this->message = "User exists, pick another username";
	}

	public function getNewUser() {
		try {
			return new \model\User($this->getUserName(), $this->getPassword());
		} catch (\model\ShortUsernameException $e) {
			$this->message = "Username has too few characters, at least 3 characters.";
		} catch (\model\ShortPasswordException $e) {
			$this->message = "Password has too few characters, at least 6 characters.";		
		} catch (\model\UsernameAndPasswordMissingException $e) {
			$this->message = "Username has too few characters, at least 3 characters. 
							  Password has too few characters, at least 6 characters.";
		} catch (\model\InvalidCharException $e) {
			$this->message = "Username contains invalid characters.";
		} catch (\view\PasswordsNoMatchException $e) {
			$this->message = "Passwords do not match.";
		} catch (Exception $e) {
			$this->message = "Unspecified error";
		} 
		return null;
	}

	private function generateRegisterForm() {
		return "<form method='post' > 
				<fieldset>
					<legend> Register - enter Username and password</legend>
					<p id='".self::$messageID."'>" . $this->message . "</p>
					<div class='form-group'>
						<label for='".self::$username."'>Username :</label>
						<input type='text' id='".self::$username."' class='form-control' name='".self::$username."' value='" . strip_tags($this->getUserName()) . "'/>
					</div>
					<div class='form-group'>
						<label for='".self::$password."'>Password :</label>
						<input type='password' id='".self::$password."' class='form-control' name='".self::$password."'/>
					</div>
					<div class='form-group'>
						<label for='".self::$rptPassword."'>Repeat Password :</label>
						<input type='password' id='".self::$rptPassword."' class='form-control' name='".self::$rptPassword."'/>
					</div>
					<div class='form-group'>
						<input type='submit' name='".self::$register."' class='btn btn-default' value='Register'/>
					</div>
				</fieldset>
			</form>";
	}

	public function render() {

		$html = "<h2>Register new user</h2>";

		$html .= $this->generateRegisterForm();

		return $html;
	}
}