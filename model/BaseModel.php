<?php
namespace Model;
/**
 * 
 */

require_once __DIR__. "/../vendor/autoload.php";

use Config\DBManager as DBManager;

class BaseModel 
{
	protected $dbm = null;
	protected $dbConnection = null;

	public function __construct()
	{
		// $this->dbm = new DBManager();		
	}
        

        public function getDefaultConnection(){
            
            $dbm = new DBManager();
            return $dbm->getDefaultDbConnection();
        }
	
}
// $obj = new BaseModel();