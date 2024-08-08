<?php

function userLogin(PDO $db, string $name, string $pass) : bool | string {

    
    $sql = "SELECT *
            FROM `cp_users`
            WHERE `cp_username` = ?";

$stmt = $db->prepare($sql);
$stmt->bindValue(1, $name);

    try {
        $stmt->execute();
            if($stmt->rowCount()===0) return false;
                $result = $stmt->fetch();

            if (password_verify($pass, $result['cp_pwd'])) {
                $_SESSION = $result;
                unset($_SESSION['cp_pwd']);
                $_SESSION['id'] = session_id();
;
                return true;
            }else {
                $errorMessage = "incorrect login details";
                return $errorMessage;
            }
        }catch (Exception $e) {
            return $e->getMessage();
        } 
}