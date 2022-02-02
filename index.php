<?php
session_start();
$request = $_SERVER['REQUEST_URI'];
switch ($request) {
	case '/' :
		require_once __DIR__ . '/controllers/guestpage.php';
		(new GuestpageController)->index();
		break;
	case '/loginpage':
	case '/adminpage':
		require_once __DIR__ . '/controllers/adminpage.php';
		(new AdminpageController)->index();
		break;
	default:
		http_response_code(404);
		require __DIR__ . '/views/404.html';
		break;
}