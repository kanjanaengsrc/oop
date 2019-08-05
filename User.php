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
    public function NoticeFix($com="",$sym="",$doc="",$labs="")
    {
        $doc->repDocId = date('dMY H:i:s');
        $doc->symthom = $sym;
        $doc->isDone = false;
        $doc->tecnicalName = "Mr.Merlin";
        //Search where computer was placed in
        foreach($labs as $key => $lab){
            foreach($lab->compList as $value){
                //print_r($value);
                if($value->comId == $com){
                    printf("$com found in ".$lab->name."\n");
                    $doc->labName = $lab->name;
                    return $doc;
                }
            }
        }
        return "FAIL";
    }
}
