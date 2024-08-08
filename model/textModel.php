<?php



function addNewText(PDO $db, string $selector, string $english, string $french, string $type) : bool | string {
    $sql = "INSERT INTO `cp_text`(
                        `cp_text_element`, 
                        `cp_text_en`, 
                        `cp_text_fr`, 
                        `cp_text_type`
                        ) 
            VALUES (?,?,?,?)";

$stmt = $db->prepare($sql);
$stmt->bindValue(1, $selector);
$stmt->bindValue(2, $english);
$stmt->bindValue(3, $french);
$stmt->bindValue(4, $type);

try{
$stmt->execute();
return true;

}catch(Exception){
$errorMessage = "Couldn't add that";
return $errorMessage;
}
}

function getTextByUserLang(PDO $db, string $userLang) : array | string {

        $userLang === "en" ?        
        $lang = "cp_text_en" :
        $lang = "cp_text_fr";
    
        $sql = "SELECT `cp_text_element` AS `elem`, 
                $lang AS `theText`, 
                `cp_text_type` AS theType
                FROM `cp_text`";
    
    try{
    $query = $db->query($sql);
    if ($query->rowCount() === 0) {
    $errorMessage = "Something went wrong getting site text";
    return $errorMessage; 
    }else {
    $result = $query->fetchAll();
    $query->closeCursor();
    return $result;
    } 
    
    }catch(Exception $e) {
    return $e->getMessage();
    }
    
    }

    function getAllTexts(PDO $db) : array | bool | string {
        $sql = "SELECT `cp_text_element` AS `elem`, 
                        `cp_text_en` AS `enText`, 
                        `cp_text_fr` AS `frText`,
                        `cp_text_type` AS theType,
                        `cp_text_id` AS `id`
                FROM `cp_text`";
        try {
            $query = $db->query($sql);
            if ($query->rowCount() === 0) {
                $errorMessage = "There is no text yet";
                return $errorMessage; 
            }else {
                $result = $query->fetchAll();
                $query->closeCursor();
                return $result;
            }
        }catch(Exception $e) {
            return $e->getMessage();
        }
        
    }

    function getOneTextForUpdate(PDO $db,int $id) : array | string {
        $sql = "SELECT `cp_text_element` AS `elem`, 
                       `cp_text_en` AS `enText`, 
                       `cp_text_fr` AS `frText`,
                       `cp_text_type` AS theType,
                       `cp_text_id` AS `id`
                FROM `cp_text`
                WHERE `cp_text_id` = ?";
        $stmt = $db->prepare($sql);

        try{
            $stmt->execute([$id]);
            $result = $stmt->fetch();
            return $result;
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }

    function updateOneText(PDO $db, int $id, string $elem, string $eng, string $fre, string $type) : bool | string {
        $sql = "UPDATE `cp_text` 
                SET `cp_text_element`= ?,
                    `cp_text_en`= ?,
                    `cp_text_fr`= ?,
                    `cp_text_type`= ?
                     WHERE `cp_text_id` = ?";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(1, $elem);
        $stmt->bindValue(2, $eng);
        $stmt->bindValue(3, $fre);
        $stmt->bindValue(4, $type);
        $stmt->bindValue(5, $id);
        
    try{
        $stmt->execute();
        return true;
        
        }catch(Exception){
        $errorMessage = "Couldn't update that";
        return $errorMessage;
        }
        return true;
    }