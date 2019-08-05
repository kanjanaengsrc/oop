<?php
require_once("./User.php");
class Leader extends User
{
    public function __construct($name="")
    {
        parent::__construct($name);
    }
    public function AssignTechToLab($lab,$techName){
        $lab->techName = $techName;
    }
}
