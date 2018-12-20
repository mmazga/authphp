<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 18.12.2018
 * Time: 14:15
 */


if(isset($_POST['login-submit'])){
    require 'dbh.inc.php';
    $mailuid = $_POST['mailuid'];
    $password = $_POST['password'];
    if(empty($mailuid) || empty($password)){
        header("Location: ../index.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../index.php?error=sqlerror1");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid );
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $passwordCheck = password_verify($password, $row['pwdUsers']);
                if($passwordCheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                elseif ($passwordCheck == true){
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];
                    header("Location: ../index.php?login=succsess");
                    exit();
                }
            }
            else{
                header("Location: ../index.php?error=nousers");
                exit();
            }
        }

    }

}
else{
    header("Location: ../index.php");
    exit();
}