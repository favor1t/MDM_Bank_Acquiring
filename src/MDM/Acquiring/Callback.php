<?php
namespace MDM\Acquiring;

use DB\db as db;

/**
 * Description of Callback
 *
 * @author 
 */
class Callback
{
    protected $_table = "payments_callback";

    /**
     * 
     * @param type $order_id
     * @param type $params
     * @return type
     */
    public function __construct ($order_id, $params)
    {
            $db = new db();

            $fields = array();
            $fields['json_answer'] = json_encode($params);
            $fields['order_id'] = $order_id;

            return $db->insert($this->_table,$fields);
    }

}
