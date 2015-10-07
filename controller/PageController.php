<?php

namespace controller;

class PageController {

	public function renderPage() {
		// Create model
		$m = new \model\LoginModel();

		// Create general views
		$nv = new \view\NavigationView();
		$dtv = new \view\DateTimeView();
		$lv = new \view\LayoutView();
		
		// Run register
		if ($nv->inRegistration() == true) {
			$v = new \view\RegisterView();
		}

		// Run login
		if ($nv->inRegistration() == false) {
			$v = new \view\LoginView($m);
			$c = new \controller\LoginController($m, $v);
			$c->doControl();
		}

		//Generate output
		$lv->render($m->isLoggedIn($v->getUserClient()), $v, $nv, $dtv);

	}
}