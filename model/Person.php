<?php
namespace Model;

require_once __DIR__. "/../vendor/autoload.php";

/**
 * 
 */
use Model\BaseModel;
use PDO;

class Person extends BaseModel
{
	
	public function insert($data){		

		$dbh = $this->getDefaultConnection();
		$sql = "
				INSERT INTO tbl_person
				(
					`first_name`,
					`last_name`,
					`dob`,
					`gender`,
					`email`,
					`phone`,
					`status`,
					`note`
				)
				VALUES(
					:firstName,
					:lastName,
					:dob,
					:gender,
					:email,
					:phone,
					:status,
					:note
				)
		";
		$sth = $dbh->prepare($sql);
		
		$sth->bindValue(":firstName", $data['firstName'], PDO::PARAM_STR);
		$sth->bindValue(":lastName", $data['lastName'], PDO::PARAM_STR);
		$sth->bindValue(":dob", $data['dob'], PDO::PARAM_STR);
		$sth->bindValue(":gender", $data['gender'], PDO::PARAM_STR);
		$sth->bindValue(":email", $data['email'], PDO::PARAM_STR);
		$sth->bindValue(":phone", $data['phone'], PDO::PARAM_STR);
		$sth->bindValue(":status", $data['status'], PDO::PARAM_STR);
		$sth->bindValue(":note", $data['note'], PDO::PARAM_STR);

		$sth->execute();

		return $dbh->lastInsertId(); 

	}

	public function getAll(){
		$dbh = $this->getDefaultConnection();
		$sql = "SELECT * FROM tbl_person order by id desc;";
		$sth = $dbh->prepare($sql);
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
		return $result;
	}

	public function getById($id){
		$dbh = $this->getDefaultConnection();
		$sql = "SELECT * FROM tbl_person where id = :id order by id desc;";
		$sth = $dbh->prepare($sql);
		
		$sth->bindValue(":id", $id, PDO::PARAM_INT);
		$sth->execute();
		
		$result = $sth->fetchAll(PDO::FETCH_ASSOC); 
		return $result;
	}


}
/*$data['firstName'] = "Erric";
$data['lastName'] = "Dannial";
$data['dob'] = "1991-04-02";
$data['gender'] = "Male";
$data['email'] = "erric.d@xyz.com";
$data['phone'] = "0932458621";
$data['status'] = "active";
$data['note'] = "testing";*/

// var_dump($data);

// $obj = new Person();
// $result = $obj->getAll();
// $result = $obj->getById(1);
// echo $obj->insert($data);
// var_dump($result);