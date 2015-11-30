<?php
namespace MDM\DB;

use DB\db as db;

class Order
{
	protected $_table = "payments";

	public function updateOrder( $order_id, $params )
	{
		$db = new db();
		return $db->update( $this->_table,$params,"ORDER_ID = :ORDER_ID", array(":ORDER_ID"=>$order_id) );
	}

	public function insertOrder( $insert )
	{
		$db = new db();
		print_r($insert);
		return $db->insert( $this->_table , $insert );
	}

	public function generateOrderID($account_number)
	{
		return 1000 + $db->run('SELECT COUNT(*) FROM $this->_table');
	}
}
