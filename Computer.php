<?php
class Computer {
    private $comId;
    private $isReady;
    //private $techName;

    public function __construct($comId = "")
    {
        $this->comId = $comId;
        $this->isReady = true;
    }
    public function __get($attr)
    {
        if (property_exists($this, $attr)) {
            return $this->$attr;
        }
    }
    public function __set($attr, $value)
    {
        if (property_exists($this, $attr)) {
            $this->$attr = $value;
        }
    }
}
