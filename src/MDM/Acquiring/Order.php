<?php
namespace MDM\Acquiring;

use DB\db as db;

/**
 * Description of Order
 *
 * @author 
 */
class Order extends \MDM\Acquiring\Form
{
    /**
     *
     * @var type 
     */
    protected $_table = "payments";

    /**
     *
     * @var type 
     */
    protected $_prefixfields = "_mdm";

    /**
     *
     * @var type 
     */
    protected $_prefixorder = 1000;

    /**
     * 
     * @param type $order_id
     * @param type $params
     * @return type
     */
    public function updateOrder( $order_id, $params )
    {
        $db = new db();
        $update = $this->preUpdate($params);
        return $db->update( $this->_table,$update,"order_mdm = :order_mdm", array(":order_mdm"=>$order_id) );
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    public function insertOrder( $data )
    {
        $db = new db();
        
        $this->setOption($data);
        $this->setTimestamp();
        $order = $this->generateOrder($data['account_number'], $db);
        $params = $this->preUpdate($this->getOptions());
            
        if($db->insert($this->_table,$params)>0){
            return $order;
        }
        
        return false;

    }
    
    /**
     * 
     * @param type $order_id
     * @return type
     */
    public function getFields($order_id)
    {
        $db = new db;
        $db_fields = $db->select($this->_table, "order_mdm = :order_mdm", array(":order_mdm"=>$order_id), "order_mdm, terminal_mdm, intref_mdm, trtype_mdm, rrn_mdm, timestamp_mdm, trtype_mdm, currency_mdm, amount_mdm");

        return $this->preReturn($db_fields[0]);
    }
    
    /**
     * 
     * @param type $account_number
     * @param db $db
     */
    public function generateOrder($account_number,db $db)
    {

        $count = $db->run("SELECT COUNT(*) FROM $this->_table");
        $prefix = $this->_prefixorder + $count[0]['COUNT(*)'];
        $order = $account_number.$prefix;

        $this->setOption("ORDER", $order);

        return $order;
    }

    /**
     * 
     * @param type $data
     * @return type
     */
    protected function preUpdate( $data )
    {
        if(is_array($data)){
            $array = array();

            foreach($data as $k=>$v){
                $array[$k.$this->_prefixfields] = $v;
            }

            return array_change_key_case($array,CASE_LOWER);
        }

    }
    
    protected function preReturn($fields)
    { 
        foreach(array_change_key_case($fields, CASE_UPPER) as $k=>$v){
            $this->setOption(substr($k,0,-strlen($this->_prefixfields)),$v);
        }
        
        return $this->getOptions();
    }
    
}
