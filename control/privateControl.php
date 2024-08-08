<?php

$allText       = getTextByUserLang($db, $_SESSION["cp_lang"]);
$completeTexts = getAllTexts($db);

if(isset($_GET["logout"])) {
    require("../model/logoutModel.php");
    die();
}
// ADD TEXT
if (isset($_POST["selectInp"],
          $_POST["englishInp"],
          $_POST["frenchInp"],
          $_POST["typeInp"]))
           {
            $selector = standardClean($_POST["selectInp"]);
            $eng      = simpleTrim($_POST["englishInp"]);
            $fre      = simpleTrim($_POST["frenchInp"]);
            $type     = standardClean($_POST["typeInp"]);

            $addText = addNewText($db, $selector, $eng, $fre, $type);
            if (is_string($addText)) {
                $errorMessage = $addText;
            }
           }

// GET TEXT FOR UPDATE
if (isset($_GET["item"]) &&
          ctype_digit($_GET["item"])) {
    $id = intval(intClean($_GET["item"]));
$getOneText = getOneTextForUpdate($db, $id);
                }


// UPDATE ONE TEXT
if (isset($_POST["oneTextId"],
          $_POST["oneTextElem"],
          $_POST["oneTextEng"],
          $_POST["oneTextFre"],
          $_POST["selectorType"]
        ) &&
        ctype_digit($_POST["oneTextId"])) {
            $id     = intval(intClean($_POST["oneTextId"]));
            $elem   = standardClean($_POST["oneTextElem"]);
            $eng    = standardClean($_POST["oneTextEng"]);
            $fre    = standardClean($_POST["oneTextFre"]);
            $type   = standardClean($_POST["selectorType"]);

    $updateText = updateOneText($db, $id, $elem, $eng, $fre, $type);
    if (is_string($updateText)) {
        $errorMessage = $updateText;
    }else if ($updateText === true) {
 
        header("Location: ?updateText");
          die();
      }
        }


$title = 'Hi Boss';
include("../view/private/privateHomeView.php");
die();