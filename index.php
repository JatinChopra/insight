<?php session_start(); ?>
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
          /* max-height:500px; */
        }

        .card-header{
          padding-top: 20px;
          padding-bottom:0;
          border-bottom:none;
        }

        .card-body{
          padding-top:15px;
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

      <div class="card bg-dark mb-3" >
        <div class="card-header">user_one</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="card bg-dark mb-3" >
        <div class="card-header">user_two</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>


      <div class="card bg-dark mb-3" >
        <div class="card-header">user_three</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card bg-dark mb-3" >
        <div class="card-header">user_one</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>

      <div class="card bg-dark mb-3" >
        <div class="card-header">user_two</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>


      <div class="card bg-dark mb-3" >
        <div class="card-header">user_three</div>
        <div class="card-body">
            <h4 class="card-title">Light card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>



    </div>
</div>

</body>


</html>