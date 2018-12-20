<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 18.12.2018
 * Time: 17:06
 */

require 'header.php';
?>
<main>

	<h1>Reset you password</h1>
    <p>An e-mail will be send to you with instructions</p>
    <form action="includes/reset-request.inc.php" method="post">
        <input type="text" name="email" placeholder="Enter your email">
        <button type="submit" name="reset-request-submit">Receive new password</button>
    </form>
    <?php
        if (isset($_GET['reset'])){
            if ($_GET['reset'] == "succsess"){
                echo '<p>Check your email!</p>';
            }
        }
    ?>

</main>

<?php

require 'footer.php';

?>