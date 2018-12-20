<?php
/**
 * Created by PhpStorm.
 * User: iliyas
 * Date: 18.12.2018
 * Time: 9:58
 */

$servername = "localhost";
$dBusername = "root";
$password = "";
$dBname = "tutorial";

$conn = mysqli_connect($servername, $dBusername, $password, $dBname);

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
