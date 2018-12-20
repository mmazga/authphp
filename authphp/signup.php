

<main>

	<h>Signup</h>
    <?php
    if(isset($_GET['error'])) {
        if ($_GET['error'] == "emptyfields") {
            echo '<p>Please fill all fields</p>';
        }
        elseif ($_GET['error'] == "invalidemailuid"){
            echo '<p>Invalid e-mail and user</p>';
        }
        elseif ($_GET['error'] == "invaliduid"){
            echo '<p>Invalid userame</p>';
        }
        elseif ($_GET['error'] == "invalidemail"){
            echo '<p>Invalid e-mail</p>';
        }
        elseif ($_GET['error'] == "passwordcheck"){
            echo '<p>Your password do not match!</p>';
        }
        elseif ($_GET['error'] == "usertaken"){
            echo '<p>User already taken</p>';
        }
    }
    elseif ($_GET['signup'] == "succsess"){
        echo '<p>Succsessful registration</p>';
    }
    ?>
	<form action="includes/signup.inc.php" method="post">
		 <input type="text" name="uid" placeholder="Username">
		 <input type="text" name="email" placeholder="E-mail ">
         <input type="password" name="password" placeholder="Password">
         <input type="password" name="password-repeat" placeholder="Repeat password">
         <button type="submit" name="signup-submit">Signup</button>
	</form>

</main>

<?php

require 'footer.php';

?>
