<?php
include_once '../app/config.php';
include_once '../src/Core/Database.php';
include_once '../src/Core/AbstractModel.php';
include_once '../src/Model/RequestModel.php';
include_once '../src/Model/StatusModel.php';


//Edition d'une requête
$title = "Traitement des requêtes";
$template = "edit";
$requestId = $_GET['id'];

$requestModel = new RequestModel();
$request = $requestModel -> getOneRequest($requestId);


$statusModel = new StatusModel();
$allStatus = $statusModel -> getAllStatus();


if (!empty(($_POST))){
    $sucess ='Le status de la  requête a bien été modifiée!';
    $updatedStatus = strip_tags(trim($_POST['status']))   ;
    $statusModel = new StatusModel();
    $updateStatus = $statusModel -> updateStatus($updatedStatus, $requestId);
    header( "Refresh:2; url=dashboard.php");
}


include '../templates/base.phtml';
