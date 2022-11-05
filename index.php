<?php
require "required.php";

$page = $_GET["p"] ?? null;

switch ($page) {
    case "add_journey":
        include "controllers/journey/add_journey.php";
        break;
    case "journey":
    default:
        include "controllers/journey/journey.php";
        break;
}
