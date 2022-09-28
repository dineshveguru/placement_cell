<?php

session_start();
$auth = isset($_SESSION['company_email'])  && isset($_SESSION['company_key']) && isset($_SESSION['company_name']);

include "database/dbconfig.php";
if(!$auth)
{

    header("Location: index.php");
}


?>