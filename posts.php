<?php session_start(); 
    $conn = new mysqli("localhost","bob","pass","insight");

    if(!$conn){
      die();
    }

    $sql = "SELECT * FROM posts order by id desc";
    $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
    <title>UPES Insight | FEED</title>
    <?php include("./inc/header.php"); ?>
    <style>
    @media (prefers-reduced-motion:no-preference){
* {
  scroll-behavior: smooth;
}
}
        *{
          margin :0px;
          padding:0px;
        }

        body{
          /* padding-top:20%; */
          height:100vh;
          /* background-color:green; */
        }
  
      .scroller{
      overflow-y : scroll;
      /* background-color:green; */
      height:100%;
      padding-top:100px;
      padding-bottom:100px;
      width:100%;
      }
        .feedscontainer{
          /* background-color: yellow; */
          height:100%;
          display:flex;
          flex-direction: column;
          flex-wrap:nowrap;
          justify-content:center;
          align-items:center;
        }

        .card{
          width:70%;
          margin-left:auto;
          margin-right:auto;
          max-height:350px;
          margin-bottom:1rem;
          /* max-height:500px; */
        }

        .card-body{
          padding-top:15px;
        }
    
        .footer-button-holder{
          display:flex;
          flex-direction: column;
          align-items:center;
          justify-content:center;
          /* background-color:yellow; */
          padding:20px;
          position:fixed;
          top:auto;
          bottom:0;
          width:100%;
          /* border-radius: 15px 15px 0 0; */
          /* background-color: #282A2B; */
          /* border-top : 3px solid grey; */
          
        }

        .desc{
          
        }

        .uname{
          color:grey;
        }

        @media (max-width:470px) {
          .card{
            width:100%;
            margin-bottom: 0.1rem;
            /* padding:0; */
            border-radius:0;
          }
          
        }

        
    </style>
</head>

<body>
     

     <!-- <h1>Posts</h1> -->
<?php 
    //     if(isset($_SESSION['user'])){
    //        echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
    //     }
    //  ?>

<div class="feedscontainer">
    <div class="scroller">


      <?php foreach($result as $res): ?>
      <div class="card bg-dark" >
      <?php
          $id = $res['id'];
          $heading = $res['heading'];
          $desc = $res['postdesc'];
          $sq0 = "select * from users where id=$id;";
          $result = $conn->query($sq0);
          $row = $result->fetch_assoc();
          $username = $row['username'];
      ?>
      
        <div class="card-header"><?php echo $heading ?></div>
        <div class="card-body">
            <p class="desc"><?php echo $desc ?></p>
            <p class="card-text uname">Posted by : <?php echo $username ?></p>
        </div>
      </div>
      <?php endforeach;?>
      
    </div>
    <?php
      
    ?>
</div>
<div class="footer-button-holder">
<a class="btn wrapper" href="./createpost.php" data-bs-toggle="offcanvas" style="width:180px;color:white;" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="margin: 0 auto; color:white;">
  <bold>Create New Post<bold>
</a>
</div>
</body>


</html>