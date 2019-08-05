<?php
class RepairDoc
{
    private $repDocId;
    private $symthom;
    private $labName;
    private $isDone;
    private $technicalName;
    public function __construct()
    {
        $repDocId = 0;
        $symthom = "";
        $labName = "";
        $isDone = false;
        $technicalName = "";
    }
    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
    }
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
    public function QueryUnrepairDoc($allDoc){
        return $this;
    }
    public function ChangeFixStatus($doc){
        $this->isDone = true;
    }
}
