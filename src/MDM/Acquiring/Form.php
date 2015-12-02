<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
        "COUNTRY" => "",
        "MERC_GMT" => "",
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
                    if($key=="AMOUNT"){
                        $this->options[$key] = number_format($value,2,'.','');
                    } else {
                        $this->options[$key] = $value;
                    }
                }
            }    
            return $this->options;
            
        } elseif (isset($key)) {
            if(array_key_exists($key, $this->options)){
                
                if($key=="AMOUNT"){
                    $this->options[$key] = number_format($value,2,'.','');
                } else {
                    $this->options[$key] = $value;
                }
                
                return $this->options[$key];
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
    
    protected function formatNumber()
    {
        
    }

}
