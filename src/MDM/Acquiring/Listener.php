<?php
namespace MDM\Acquiring;

use MDM\Acquiring\DBOrder as MDB;
use MDM\Acquiring\Callback as CallBack;

class Listener
{
	public function __construct($callback)
	{
            if ( !is_array($callback) && empty($callback['RC']) && empty($callback['Order']) ){
                    return false;
            }

            $this->record($callback);
	}

	protected function record(Array $callback)
	{
            if( isset( $callback['RC'] ) && isset( $callback['Order'] ) ){
                $this->updateOrder($callback['Order'],$callback);	
            }

            if(isset($callback['Order'])){
                $this->insertLog($callback['Order'],$callback);
            }
	}

	protected function updateOrder($order_id , $callback)
	{
            $MDM = new MDB();
            return $MDM->updateOrder($order_id, array_change_key_case($callback, CASE_LOWER));
	}

	protected function insertLog($order_id , $callback)
	{
            new CallBack($order_id,$callback);
	}
}
