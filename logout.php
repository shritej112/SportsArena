<?php
session_start();
$bhajiye="";
if(isset($_SESSION['email_id']))
{
    
    session_destroy();
     header('location:home2.php');

 
    }
else
{
    echo 'didnt work';
    // header('location:home1.php');
//    header('location:sample2.php');
}
?>
