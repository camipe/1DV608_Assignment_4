<?php

namespace view;

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

	private function generateRegisterForm($message) {
		return "<form method='post' > 
				<fieldset>
					<legend> Register - enter Username and password</legend>
					<p id='".self::$messageID."'>$message</p>
					<div class='form-group'>
						<label for='".self::$username."'>Username :</label>
						<input type='text' id='".self::$username."' class='form-control' name='".self::$username."' value=''/>
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
		$message = "";

		$html = "<h2>Register new user</h2>";

		$html .= $this->generateRegisterForm($message);

		return $html;
	}
}