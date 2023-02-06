<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
    <title>UPES Insight | Create Post</title>
    <?php include("./inc/header.php"); ?>
    <style>
        h1{
            padding-top:80px;
        }
    </style>
</head>

<body>
     <?php 
        if(isset($_SESSION['user'])){
            echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
        }
     ?>
</body>


</html>