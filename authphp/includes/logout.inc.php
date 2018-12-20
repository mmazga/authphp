<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 18.12.2018
 * Time: 16:03
 */

session_start();
session_unset();
session_destroy();
header("Location: ../index.php");