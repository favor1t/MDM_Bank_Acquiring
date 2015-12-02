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
        "DESC" => "",
        "MERCH_NAME" => "",
        "MERCH_URL" => "",
        "MERCHANT" => "",
        "TERMINAL" => "",
        "EMAIL" => "",
        "TRTYPE" => "",
        "COUNTRY" => "",
        "MERC_GMT" => "",
        "TIMESTAMP" => "",
        "BACKREF" => ""
    );
    
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
     * 
     * @param type $key
     * @param type $value
     * @return \MDM\Acquiring\Form
     */
    public function setOption($key,$value) 
    {
        if(array_key_exists($key, $this->options)){
            $this->options[$key] = $options;
            return $this[$key];
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


}
