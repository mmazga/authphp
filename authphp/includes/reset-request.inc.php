<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 19.12.2018
 * Time: 9:53
 */
if(isset($_POST['reset-request-submit']) && !empty($_POST['email'])){
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);
    $url = "http://127.0.0.1:8080/project/restapiphp/create-new-password.php?selector=" . $selector . "&validator=" .
    bin2hex($token);
    $expires = date("U") + 1800;
    require 'dbh.inc.php';

    $userEmail = $_POST['email'];
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There is an error1";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "There is an error2";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Reset your password";

    $message = "We recieved a password reset request. he link to rest your password is below. If you didn't make this request just ignore";
    $message .= "<p>Here is you password link:</p>";
    $message .= '<a href = "' . $url . '">' . $url . '</a></p>';

    $headers = "From: Iliyas <akhmetov.iliyas@gmail.com>\r\n";
    $headers .= "Reply-To: akhmetov.iliyas@gmail.com\r\n";
    $headers .= "Content-type: text/html\r\n";

//    $headers = [
//        'From' => 'akhmetov.iliyas@gmail.com',
//        'Reply-To' => 'akhmetov.iliyas@gmail.com',
//        'X-Mailer' => 'PHP/' . phpversion(),
//        'Content-type' => 'text/html'
//    ];

    var_dump($to . $subject . $message . $headers);exit;

    mail($to, $subject, $message, $headers);
    header("Location: ../resetpassword.php?reset=succsess");
}

else{
    header("Location: ../index.php");
}