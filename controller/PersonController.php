<?php
namespace Controller;
require_once __DIR__. "/../vendor/autoload.php";
/**
 * 
 */
use Model\Person;
class PersonController 
{
	private $person = null;

	public function __construct()
	{
		$this->person = new Person();
	}

	public function storeRecord()
	{
		$data['firstName'] = $_REQUEST['firstName'];
		$data['lastName'] = $_REQUEST['lastName'];
		$data['dob'] = $_REQUEST['dob'];
		$data['gender'] = $_REQUEST['gender'];
		$data['email'] = $_REQUEST['email'];
		$data['phone'] = $_REQUEST['phone'];
		$data['status'] = $_REQUEST['status'];
		$data['note'] = $_REQUEST['note'];

		$lastInsertId = $this->person->insert($data);

		if(!empty($lastInsertId)){
			$msg['status'] = 'OK';
			$msg['message'] = 'Your record has been successfully stored !' ;
			$msg['person_id'] = $lastInsertId;

			header('Content-Type: application/json');
			echo json_encode($msg, JSON_PRETTY_PRINT);			
		}
		else{
			$msg['status'] = 'Error';
			$msg['message'] = 'Cannot store your record !' ;

			header('Content-Type: application/json');
			echo json_encode($msg, JSON_PRETTY_PRINT);				
		}

	}

	public function getAllRecord()
	{
		$persons = $this->person->getAll();

		header('Content-Type: application/json');
		echo json_encode($persons, JSON_PRETTY_PRINT);
	}

	public function getById()
	{
		$id = $_REQUEST['id'];

		$persons = $this->person->getById($id);

		header('Content-Type: application/json');
		echo json_encode($persons, JSON_PRETTY_PRINT);
	}
	
}