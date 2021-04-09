<?php
require_once 'TimeTravel.php';
$br = "<br>";
$br2 = "<br><br>";


/** L'instanciation d'objet de classe TimeTravel */
$newTravel = new TimeTravel("1985-12-31",1000000000);


/** Appelle du méthode getCurrentDate */
echo "Date de depart: " . $newTravel->getCurrentDate()->format('dS M Y') . $br2;


/** Appelle du méthode findDate */
echo $newTravel->findDate($newTravel->getInterval()) . $br2;


/** Appelle du méthode getTravelInfo */
echo $newTravel->getTravelInfo() . $br;


/** Paramètre d'entrée pour la methode backToFutureStepByStep */
$stopsInterval = new DateInterval('P1M8DT3M4S');
$datePeriod = new DatePeriod($newTravel->getDestinationDate(), $stopsInterval ,$newTravel->getCurrentDate());


/** Déclaration d'une variable qui est égal à la table que retourne la méthode backToFutureStepByStep  */
$travelSteps = $newTravel->backToFutureStepByStep($datePeriod);


/** Renvoie du tableau retourné par la méthode backToFutureStepByStep avec la structure foreach */
echo $br . "Les dates des arrêts, pour régler le convecteur temporel:" . $br;
foreach ($travelSteps as $value) {
    echo $br . $value;
}