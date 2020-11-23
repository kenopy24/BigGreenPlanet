<?php
//mysqli_connect (hostName, username, password, databaseName)
$db=mysqli_connect("localhost","root","","biggreenplanet");
//check connection
if(mysqli_connect_error())
{
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
}
?>