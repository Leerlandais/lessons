<?php


if (isset($_GET['json'])) {
    $datas = getTextByUserLang($db, $_SESSION["cp_lang"]);
    if (!is_string($datas)) {
        echo json_encode($datas);
    }
    exit();
}

