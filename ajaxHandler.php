<?php

$controller = $_GET["controller"];
$action = $_GET["action"];
if	($controller && $action) {
	require_once __DIR__ . "/controllers/" . strtolower($controller) . ".php";
	$controller .= "Controller";
	$x = new $controller();
	$x->{$action}();
}