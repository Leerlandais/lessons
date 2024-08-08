<?php


if (isset($_POST["user_lang"])) {
  $_SESSION["cp_lang"] = $_POST["user_lang"];

}

$allText = getTextByUserLang($db, $_SESSION["cp_lang"]);

if (isset($_POST["nameInp"], $_POST["passInp"])) {
        $name = standardClean($_POST["nameInp"]);
        $pwd  = simpleTrim($_POST["passInp"]);
    
        $attemptLogin = userLogin($db, $name, $pwd);

        if ($attemptLogin === true) {
 
          header("Location: ./");
            die();
        }else {
          $_SESSION["errorMessage"] = "incorrect login details";
            $title = "Incorrect Login";
            include "../view/publicHomeView.php";
            die();
        }
}

$title = "Welcome";
include("../view/publicHomeView.php");
die();