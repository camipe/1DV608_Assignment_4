<?php

namespace view;

class NavigationView {

	private static $registerURL	= "register";

	public function inRegistration() {
		return isset($_GET[self::$registerURL]);
	}

	public function getLinkToLogin() {
		return "<a href='?'>Back to login</a>";
	}

	public function getLinkToRegister() {
		return "<a href='?" . self::$registerURL . "'>Register a new user</a>";
	}
}