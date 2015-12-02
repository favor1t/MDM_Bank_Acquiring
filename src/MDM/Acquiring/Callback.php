<?php
namespace MDM\Acquiring;

use DB\db as db;

class Callback
{
	protected $_table = "payments_callback";

	public function __construct ($order_id, $params)
	{
		$db = new db();

		$fields = array();
		$fields['json_answer'] = json_encode($params);
		$fields['order_id'] = $order_id;

		return $db->insert($this->_table,$fields);
	}

}
