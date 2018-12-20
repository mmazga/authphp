<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 19.12.2018
 * Time: 12:07
 */

require 'header.php';
?>
    <main>
        <?php
            $selector = $_GET["selector"];
            $validator = $_GET["validator"];
            if (empty($selector) || empty($validator)){
                echo "Could not validate this request!";

            }else{
                if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
                    ?>
                    <form action="includes/reset-password.inc.php" method="post">
                        <input type="hidden" name="selector" value="<?php echo $selector;?>">
                        <input type="hidden" name="validator" value="<?php echo $validator;?>">
                        <input type="password" name="pwd" placeholder="Enter your new password">
                        <input type="password" name="pwd-repeat" placeholder="Repeat your new password">
                        <button type="submit" name="reset-password-submit">Reset password</button>
                    </form>
                <?php
                }
            }
        ?>


    </main>

<?php

require 'footer.php';

?>