<?php
namespace MDM\Acquiring;

/**
 * Description of Form
 *
 * @author 
 */
class Form {
    
    /**
     *
     * @var type 
     */
    protected $options = array(
        "AMOUNT" => "",
        "CURRENCY" => "",
        "ORDER" => "",
        "DESC" => "Description ...",
        "MERCH_NAME" => "",
        "MERCH_URL" => "",
        "MERCHANT" => "",
        "TERMINAL" => "00000000",
        "EMAIL" => "",
        "TRTYPE" => "",
        "COUNTRY" => "RU",
        "MERC_GMT" => "+3",
        "TIMESTAMP" => "",
        "BACKREF" => "",
        "TIMESTAMP" => "",
    );

    /**
     *
     * @var type 
     */
    protected $_URL = "https://mdmbank/...";
    
    /**
     * 
     * @param type $options
     */
    public function __construct($options="") 
    {
        if(is_array($options))
        {
            foreach ($options as $key=>$value)
            {
                $this->setOption($key, $value);
            }
        }
    }
    
    /**
     * 
     * @param type $key
     * @return type
     */
    public function getOption($key) 
    {
        if(array_key_exists($key, $this->options)){
            return $this->options[$key];
        }
        
    }
    
    /**
     * @example setOption (Array("param1"=>"value1", "param2"=>"value2"));
     * @example setOption ($param, $value);
     * 
     * @param type $key
     * @param type $value
     * @return type
     */
    public function setOption($key,$value="") 
    {
        if (is_array($key)){
            foreach (array_change_key_case($key,CASE_UPPER) as $k=>$v){
               if(array_key_exists($k, $this->options)){
                    $this->isAmount($k, $v);
                }
            }    
            
        } elseif (isset($value)) {
            if(array_key_exists($key, $this->options)){
                $this->isAmount($key, $value);
            }
        }

    }
   
    /**
     * 
     * @return type
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * 
     * @return type
     */
    public function getURL()
    {
       return $this->_URL; 
    }
    
    /**
     * 
     * @param type $format
     * @param type $timezone
     */
    protected function setTimestamp($format="YmdHis", $timezone="UTC")
    {
        date_default_timezone_set($timezone);
        $this->setOption("TIMESTAMP", date($format));
    }
    
    /**
     * 
     * @param type $k
     * @param type $v
     */
    public function isAmount($k, $v)
    {
        if($k=="AMOUNT"){
            $this->options[$k] =  number_format($v,2,'.','');
        } else {
            $this->options[$k] = $v;
        }
          
    }

}
