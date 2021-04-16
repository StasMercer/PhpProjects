<?php
session_start();
if (isset( $_GET['pn'])) 
{
$p=$_GET['pn'];
}

if ($p=='') {$p='main.php';}

if (isset( $_SESSION['login'])) 
{ 
     $username=$_SESSION['username']; 
}


    require_once("require/db.php");
    require("require/header.php");
    ?>




    <?php
        
        require("require/bar.php");
        require("require/content.php");
        require("require/footer.php");
        ?>