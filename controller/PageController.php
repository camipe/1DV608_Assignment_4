<?php

namespace controller;

class PageController {

	public function renderPage() {
		// Create model
		$m = new \model\LoginModel();

		// Create views
		$rv = new \view\RegisterView();
		$v = new \view\LoginView($m);
		$c = new \controller\LoginController($m, $v);
		$dtv = new \view\DateTimeView();
		$lv = new \view\LayoutView();

		//Create and run controllers run them before sending to render
		$c = new \controller\LoginController($m, $v);
		$c->doControl();

		//Generate output
		$lv->render($m->isLoggedIn($v->getUserClient()), $v, $dtv);

	}
}