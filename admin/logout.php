<?php
session_start();
include_once("../framework/site_func.php");


if(isset($_SESSION['admin_login']))
{
    //logged in
    include_once("header.php");

    session_destroy();

    redirect(0,"index.php");


    include_once("footer.php");
}
else
{
    include_once("login.php");
}



?>