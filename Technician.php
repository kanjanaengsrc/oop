<?php
require_once("./User.php");
class Technician extends User
{
    public function __construct($name = "")
    {
        parent::__construct($name);
    }
    public function WorkOnDuty($comList,$roomTotal,$lab,$maxCompPerRoom){
        $duty = count($comList);
        $lotNum = (int)($duty/$roomTotal);
        $leftNum = ($duty%$roomTotal);
        $roomCount = 1;
        $count = 0;

        printf($this->name." duty = $duty Lot = $lotNum and left = $leftNum\n");
        while ($duty > 0) {
            if ($roomCount == 10) {
                //printf("Computer is putting into $roomCount\n");
                $data = array_slice($comList, $count, $lotNum);
                
                $this->AssignCompToLab($lab[$roomCount], $data);
                $duty = ($leftNum-$lotNum);
                //printf("At the end duty = ".$duty."\n");
                $count += $lotNum;
                for ($i = 1; $i <= $leftNum; $i++) {
                    $data = array_slice($comList,$count, 1);
                    $this->AssignCompToLab($lab[$i], $data);
                    $duty--;
                    $count++;
                }
            } else {
                $data = array_slice($comList, $count, $lotNum);
                if (($maxCompPerRoom - $lab[$roomCount]->GetCurrentCompNo()) > $lotNum) {
                    //printf("You can put data into " . $lab[$roomCount]->name . "\n");
                    $this->AssignCompToLab($lab[$roomCount], $data);
                    $duty -= $lotNum;
                    $count += $lotNum;
                }
                $roomCount++;
            }
        }
    }
    public function AssignCompToLab($lab, $comp)
    { 
        $lab->AddCompToLab($comp);
    }
}
