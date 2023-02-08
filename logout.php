<?php
session_start();
include_once("framework/site_func.php");


if(isset($_SESSION['user_login']))
{
    //logged in
    session_destroy();
    redirect(0,"login.php");
}

?>