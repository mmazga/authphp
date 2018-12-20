<?php
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title></title>
  </head>


  <body>


    <header>

      <nav>
        <a href="#"></a>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">About me</a></li>
          <li><a href="#">Contacts</a></li>
        </ul>
        <div>

            <?php
                if(isset($_SESSION['userUid'])){
                    echo '<form action="includes/logout.inc.php" method="post\">
                          <button type="submit" name="loguot-submit">Logout</button>
                          </form>';
                }
                else{
                    echo '<form action="includes/login.inc.php" method="post">
                             <input type="text" name="mailuid" placeholder="email">
                             <input type="password" name="password" placeholder="Password">
                             <button type="submit" name="login-submit">Login</button>
                          </form>
                          <a href="signup.php">Signup!</a> <br>
                          <a href="resetpassword.php">Forgot your password?</a>';
                }
            ?>
            <?php
            if (isset($_GET['newpwd'])){
                if ($_GET['newpwd'] == "passwordupdated"){
                    echo '<p>Your password has been updated!</p>';
                }
            }
            ?>
        </div>
      </nav>
    </header>
