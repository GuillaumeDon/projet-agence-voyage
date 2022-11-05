<?php

require 'src/Model/JourneyModel.php';
require 'entities/Journey.php';


$journeyModel = new JourneyModel();
//$allJourneys = $journeyModel -> getAllJourneys();
$journey = $journeyModel -> getOneJourney(1);

$title = 'Test';
$template = "journey/add_journey";
include 'templates/base.phtml';