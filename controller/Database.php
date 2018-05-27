<?php 

namespace Controller;

use PDO;

 class Database extends PDO
 {
	private $host = 'localhost';
	private $dbname = 'oop';
	private $username = 'root';
	private $password = '';

	public function __construct()
	{
		parent::__construct(
			'mysql:host='.$this->host.
			';dbname='.$this->dbname,
			$this->username,
			$this->password);
		
		\Cloudinary::config(array(
    		"cloud_name" => "aviore",
    		"api_key" => "973783994341624",
    		"api_secret" => "tZFCjh0nw6jPBYczmSuPBR4kX1g"
			));
	}

 }


