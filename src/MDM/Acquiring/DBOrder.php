<?php
namespace MDM\Acquiring;

use DB\db as db;

class DBOrder
{
	protected $_table = "payments";
        
        /**
         * 
         * @param type $order_id
         * @param type $params
         * @return type
         */
	public function updateOrder( $order_id, $params )
	{
            $db = new db();
            return $db->update( $this->_table,$params,"ORDER_ID = :ORDER_ID", array(":ORDER_ID"=>$order_id) );
	}
        
        /**
         * 
         * @param type $data
         * @return type
         */
	public function insertOrder( $data )
	{
            $db = new db();
            
            $this->generateOrderID($data['account_number'], $db);

            $data['order_id'] = $this->order_id;
            $data['currency'] = "RUB";
            $data['amount'] = number_format($data['amount'], 2, '.', '');

            return $db->insert($this->_table,$data);

	}
        /**
         * 
         * @param type $account_number
         * @param db $db
         */
	protected function generateOrderID($account_number,db $db)
	{
            
            $count = $db->run("SELECT COUNT(*) FROM $this->_table");
            $prefix = 1000 + $count[0]['COUNT(*)'];
            $order_id = $account_number.$prefix;
            
            $this->order_id = $order_id;
	}
}
