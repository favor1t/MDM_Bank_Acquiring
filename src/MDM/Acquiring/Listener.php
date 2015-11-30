<?php
namespace MDM\Acquiring;

use MDM\DB\Order as MDB;
use MDM\CallBack\Order as CallBack;

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
		new MDB($order_id, $callback);
	}

	protected function insertLog($order_id , $callback)
	{
		new CallBack($order_id,$callback);
	}
}
