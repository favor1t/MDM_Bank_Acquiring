<?php
namespace MDM\CallBack;

use DB\db as db;

class Order
{
	protected $_table = "payments_callback";

	public function __construct($order_id, $params)
	{
		$db = new db();

		$fields = array();
		$fields['json_answer'] = json_encode($params);
		$fields['order_id'] = $order_id;

		return $db->insert($this->_table,$fields);
	}
}
