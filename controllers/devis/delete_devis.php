<?php
include_once '../app/config.php';
include_once '../src/Core/Database.php';
include_once '../src/Core/AbstractModel.php';
include_once '../src/Model/RequestModel.php';
include_once '../src/Model/StatusModel.php';



//Pour supprimer une requête

$requestId = $_GET['id'];



$requestModel = new RequestModel();
$requestModel -> deleteRequest($requestId);

header( "Refresh:0.5; url=dashboard.php");
exit;