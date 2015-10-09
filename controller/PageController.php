<?php

namespace controller;

class PageController {

	public function renderPage() {

		// Generate model
		$lm = new \model\LoginModel();

		// Create general views
		$nv = new \view\NavigationView();
		$dtv = new \view\DateTimeView();
		$lv = new \view\LayoutView();
		
		// Run register
		if ($nv->inRegistration() == true) {
			$rm = new \model\RegisterModel();
			$v = new \view\RegisterView();
			$c = new \controller\RegisterController($rm, $v);
			$c->doRegister();
		}

		// Run login
		if ($nv->inRegistration() == false) {
			$v = new \view\LoginView($lm);
			$c = new \controller\LoginController($lm, $v);
			$c->doControl();
		}

		//Generate output
		$lv->render($lm->isLoggedIn($v->getUserClient()), $v, $nv, $dtv);

	}
}