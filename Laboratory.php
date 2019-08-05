<?php
class Laboratory {
    private $name;
    private $techName;
    private $compList;

    public function __construct($name="",$techName="")
    {
        $this->name = $name;
        $this->techName = $techName;
        $this->compList = array();
    }
    public function __get($attr)
    {
        if(property_exists($this,$attr)){
            return $this->$attr;
        }
    }
    public function __set($attr, $value)
    {
        if(property_exists($this,$attr)){
            $this->$attr = $value;
        }
    }
    public function AddCompToLab($comps){
        //var_dump($comps);
        //printf("\n---------");
        foreach($comps as $com){
            array_push($this->compList,$com);
        }
        
    }
    public function GetCurrentCompNo(){
        return count($this->compList);
    }
}