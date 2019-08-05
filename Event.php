<?php
require_once("./Computer.php");
require_once("./Laboratory.php");
require_once("./Leader.php");
require_once("./Technician.php");
/*** Purchase No. of computer ***/
$i = 1;
$comTotal = 25;
$roomTotal = 10;
$maxCompPerRoom = 50;
while ($i <= $comTotal) {
    $comname = "CPE" . $i;
    $comList[$i] = new Computer($comname, true);
    $i++;
}

/*** Generate 10 empty laboratory ***/
$leader = new Leader("Praayooot");
$lab = array();
$count = 1;
for ($i = 1; $i <= $roomTotal; $i++) {
    $name = "Labcom" . $i;
    $lab[$i] = new Laboratory($name);
    if (($count % 2) == 0) {
        $leader->AssignTechToLab($lab[$i], "Mr. Arther");
    } else {
        $leader->AssignTechToLab($lab[$i], "Mr. Merlin");
    }
    $count++;
}
/*** Generate 10 empty laboratory and assign staff ***/
/** And also assigned computer to each lab equaly **/
$merlin = new Technician("Mr. Merlin");
$arther = new Technician("Mr. Arther");

$merlinDuty = (int) ($comTotal / 2);
$artherDuty = $comTotal-$merlinDuty;

$startElement = 0;
printf("Merling is working on $merlinDuty computer.\n");
$merlinComList = array_slice($comList,$startElement,$merlinDuty);
$merlin->WorkOnDuty($merlinComList,$roomTotal,$lab,$maxCompPerRoom);

$startElement = ($startElement+$merlinDuty);
printf("Arther is working on $artherDuty computer.\n");
$artherComList = array_slice($comList,$startElement,$artherDuty);
$arther->WorkOnDuty($artherComList,$roomTotal,$lab,$maxCompPerRoom);

var_dump($lab);