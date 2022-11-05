<?php
include_once '../app/config.php';
include_once '../src/Core/Database.php';
include_once '../src/Core/AbstractModel.php';
include_once '../src/Model/RequestModel.php';
include_once '../src/Model/StatusModel.php';

$requestModel = new RequestModel();
$Allrequests = $requestModel -> getAllRequests();

$title = 'Liste des requêtes';
$template ="dashboard";
include '../templates/base.phtml';