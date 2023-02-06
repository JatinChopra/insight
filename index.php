<?php session_start(); 
    $conn = new mysqli("localhost","bob","pass","insight");

    if(!$conn){
      die();
    }

    $sql = "SELECT * FROM posts";
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
          height:100vh;
        }
        h1{
            /* position:absolute; */
            padding-top:120px;
            padding-left:70px;
        }
      .scroller{
      overflow-y : scroll;
      /* background-color:green; */
      padding-top:20px;
      padding-bottom:20px;
      width:100%;
      }
        .feedscontainer{
          /* background-color: yellow; */
          height:75%;
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

        .card-header{
          padding-top: 20px;
          padding-bottom:0;
          border-bottom:none;
          margin:0;
        }

        .card-body{
          padding-top:15px;
        }
    
        @media (max-width:470px) {
          .card{
            width:97%;
            margin-bottom: 0.5rem;
            padding:0;
            /* border-radius:0; */
          }
          
        }
    </style>
</head>

<body>
     

     <h1>Posts</h1>
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
        <div class="card-header"><?php echo $username ?></div>
        <div class="card-body">
            <h4 class="card-title"><?php echo $heading ?></h4>
            <p class="card-text"><?php echo $desc ?></p>
        </div>
      </div>
      <?php endforeach;?>
      
    </div>
    <?php
      
    ?>
</div>

</body>


</html>