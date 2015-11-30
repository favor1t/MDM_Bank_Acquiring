<?php
namespace MDM\DB;

use DB\db as db;

class Order
{
	protected $_table = "payments";

	public function updateOrder($order_id, $params)
	{
		$db = new db();
		return $db->update($this->_table,$params,"ORDER_ID = :ORDER_ID", array(":ORDER_ID"=>$order_id));
	}

	public function insertOrder($options)
	{
		$db = new db();
		return $db->insert($this->_table,$options);
	}

	protected function getCount()
	{
		$db = new db();
		return $db->run('SELECT COUNT(*) FROM $this->_table');
	}
}
