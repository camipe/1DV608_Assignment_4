<?php

namespace view;

class RegisterView {

	/**
	 * These names are used in $_POST
	 * @var string
	 */	
	private static $register = "RegisterView::Register";
	private static $username = "RegisterView::UserName";
	private static $password = "RegisterView::Password";
	private static $rptPassword = "RegisterView::PasswordRepeat";
	private static $messageID = "RegisterView::Message";

	private function generateRegisterForm($message) {
		return "<form method='post' > 
				<fieldset>
					<legend> Register - enter Username and password</legend>
					<p id='".self::$messageID."'>$message</p>
					<label for='".self::$username."'>Username :</label>
					<input type='text' id='".self::$username."' name='".self::$username."' value=''/>
					<br/>
					<label for='".self::$password."'>Password :</label>
					<input type='password' id='".self::$password."' name='".self::$password."'/>
					<br/>
					<label for='".self::$rptPassword."'>Repeat Password :</label>
					<input type='password' id='".self::$rptPassword."' name='".self::$rptPassword."'/>
					<br/>
					<input type='submit' name='".self::$register."' value='Register'/>
				</fieldset>
			</form>";
	}

	public function doRegisterForm() {
		$message = "";

		$html = "<h2>Register new user</h2>";

		$html .= $this->generateRegisterForm($message);

		return $html;
	}
}