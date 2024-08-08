<?php

session_start(); 
// CHECK SESSION ACTIVITY OR LOGOUT AUTOMATICALLY
if (isset($_SESSION["active"]) && time() - $_SESSION["active"] > 180) {
    require_once "../model/logoutModel.php";
    exit();
}
$_SESSION["active"] = time();

// CHECK FOR ERROR MESSAGES
if (isset($_SESSION["errorMessage"])) {
    $errorMessage = $_SESSION["errorMessage"];
    unset($_SESSION["errorMessage"]);
}

if(!isset($_SESSION["cp_lang"])) $_SESSION["cp_lang"] = "en";   


require_once("../config.php");
require_once("../control/dbConnectControl.php");
require_once('../model/laundryModel.php');
require_once("../model/loginModel.php");
require_once('../model/textModel.php');
require_once("../control/jsonController.php");


if (isset($_SESSION["id"]) && $_SESSION["id"] === session_id()) {

    require_once ("../control/privateControl.php");
die();
}else {
    require_once("../control/publicControl.php");
}

$db = null;