<?php
	require_once __DIR__. "/../vendor/autoload.php";

use Controller\PersonController;	

$personControl = new PersonController();

$route = "";

if(isset($_REQUEST['route'])){
	$route = $_REQUEST['route'];
}

if($route == "home" || $route == ""){
	echo "Welcome from the home page !";
}

elseif ($route == "person_insert") {
	$personControl->storeRecord();	
}

elseif ($route == "get_all_person") {
	$personControl->getAllRecord();
}

elseif ($route == "get_person_by_id") {
	$personControl->getById();
}

else{
	echo "404 ! Requested route not found";
}