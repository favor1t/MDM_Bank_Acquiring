<?php
$_dbconf = array(
	"host" => "127.0.0.1",
	"port" => "3306",
	"dbname" => "mdmbank",
	"dblogin" => "root",
	"dbpasw" => "",
	"options" => array(
					PDO::ATTR_PERSISTENT => true, 
					PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
				),
	);