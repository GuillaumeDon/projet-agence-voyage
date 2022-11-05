<?php
require 'src/Model/JourneyModel.php';
require 'entities/Journey.php';


$journeyModel = new JourneyModel();
$allJourneys = $journeyModel -> getAllJourneys();

$title = 'Liste des séjours';
$template = "journey/journey";
include 'templates/base.phtml';