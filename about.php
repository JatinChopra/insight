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
          /* padding-top:20%; */
          height:100vh;
          /* background-color:green; */
        }

        h1{
            /* position:absolute; */
            /* padding-top:120px;
            padding-left:70px; */
        }
      .scroller{
      overflow-y : scroll;
      /* background-color:green; */
      height:70%;
      padding: 0 50px;
      padding-top:100px;
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

        .text{
        
        }

        .heading{
            text-decoration:underline;
            font-size:24px;
            font-weight:bold;
        }

        

        @media (max-width:470px) {
          .card{
            width:100%;
            margin-bottom: 0rem;
            /* padding:0; */
            border-radius:0;
          }
          
        }

        
    </style>
</head>

<body>
     

<div class="feedscontainer">
    <div class="scroller">
   <p class="heading"> 🎓 Welcome to UPESInsight! 🎓</p>
<p class="text">
Here at UPESInsight, we believe that students should have a platform where they can openly and anonymously share their opinions, thoughts, and experiences about their university. That's why we created this website, where students of UPES can log in with their student email ID and join the conversation.
</p>

<p class="heading">💬 Share Your Voice 💬<p>
<p class="text">
We know that university life is full of ups and downs, and sometimes you just need to vent. At UPESInsight, you can share whatever you want, whether it's a compliment, criticism, or just a general observation. Our goal is to create a safe and respectful space for students to connect and express themselves.
</p>
<p class="heading">🕵️‍♂️ Anonymity Guaranteed 🕵️‍♀️</p>
<p  class="text">
We understand that speaking up can be difficult, especially when you're worried about being judged or misunderstood. That's why we guarantee complete anonymity for all users. You can post under a pseudonym or just use your student email ID to log in, and rest assured that your identity will be protected.
</p>
<p class="heading">💬 Join the Conversation 💬</p>

<p class="text">At UPESInsight, we believe that the student community is stronger when we come together. So don't be shy, join the conversation and share your thoughts and opinions. Let's create a community where we can all benefit from each other's experiences and insights.</p>

<p class="heading">💥 Get Your Voice Heard 💥</p>

<p class="text">At UPESInsight, we want to empower students to be heard. We believe that your thoughts and opinions matter, and we're here to help you share them with the world. So log in, share your voice, and let's make UPES a better place for everyone!</p>

<p class="heading">🎓 Join the Community Today! 🎓</p>




    </div>
</div>
</body>

    

</html>