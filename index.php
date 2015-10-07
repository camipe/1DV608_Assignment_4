<?php
 /**
  * Solution for assignment 2
  * @author Daniel Toll
  */
require_once("Settings.php");
require_once("controller/LoginController.php");
require_once("controller/PageController.php");
require_once("view/DateTimeView.php");
require_once("view/LayoutView.php");
require_once("view/RegisterView.php");
require_once("view/LoginView.php");

if (Settings::DISPLAY_ERRORS) {
	error_reporting(-1);
	ini_set('display_errors', 'ON');
}

//session must be started before LoginModel is created
session_start();

$pc = new controller\PageController();

$pc->renderPage();

