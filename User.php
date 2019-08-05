<?php
class User
{
    private $name;

    public function __construct($name = "")
    {
        $this->name = $name;
    }
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
    protected function NoticeFix()
    {
        //
    }
}
