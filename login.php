<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <title>UPES Insight</title>
    <?php include("./inc/header.php"); ?>
    <style>
        /* *{
            background-color:#000000;
        } */
        .container{
            /* background-color:rgb(0,255,0); */
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            height:100vh;
        }
        @media (min-width:710px) {
                form{
                    width:400px;
                }

        }
        .btn{
            width:100%;
        }
        #forgotandlogin{
            display:flex;
            justify-content:space-between;
            padding-top:8px;
        }

    </style>


</head>

<body>
 <?php include("./inc/header.php"); ?>
    <div class="container">
    <br><br>
    
    <!-- <?php if(strlen($response) > 0): ?>
        <?php if($response== "Account Created"): ?>
            <div class="alert alert-dismissible alert-success">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?php 
        echo $response;
    ?>
    </div>
        <?php else: ?>       
            <div class="alert alert-dismissible alert-danger">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <?php 
        echo $response;
    ?>
    </div>
        <?php endif; ?>

    <?php endif; ?> -->
   
    <div id="alertbox" hidden="true">
     <div class="alert alert-dismissible alert-success">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   <p style="display:inline"></p>
    </div>
    </div>
    <form id="signup_form">

        <div class="form-group">

      <input type="text" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Username" required><br>
      <!-- <label for="StudentEmail" class="form-label mt-4">Student Email address</label> -->
      <input type="email" class="form-control" id="StudentEmail" aria-describedby="emailHelp" placeholder="Enter Student email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <br>
    <div class="form-group">
      <!-- <label for="StudentPassword" class="form-label mt-4">Password</label> -->
      <input type="password" class="form-control" id="StudentPassword" placeholder="Password">
    </div>
    <br>
    <button id="button" type="button" value="Signup" class="btn btn-primary">Sign Up</button>
    <div id="forgotandlogin">
        <p>Forgot Password</p>
        <p>Sign in</p>
    </div>
    </form>
    </div>
    <script>
        document.querySelector("#button").addEventListener('click',adduser);
        function adduser(){
            let username = document.querySelector("#username").value;
            let email = document.querySelector("#StudentEmail").value;
            let pass = document.querySelector("#StudentPassword").value;
            let data = "email="+window.encodeURIComponent(email)
            + "&password="+window.encodeURIComponent(pass)
            + "&username="+window.encodeURIComponent(username);
            
            var xhr = new XMLHttpRequest();

            xhr.open("POST","./addAccount.php",true);

            xhr.onload=function(){
                
                // alert(this.responeText.length);
                console.log(this.responseText);
                document.querySelector("#alertbox").removeAttribute("hidden");
                if(this.responseText == "Account Created"){
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-success");
                }else{
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                }
                document.querySelector("#alertbox p").textContent = this.responseText; 
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");            
            xhr.send(data);
        }

        document.querySelector("#alertbox button").addEventListener('click',function(){
            document.querySelector("#alertbox").setAttribute("hidden",true);
        });
    </script>
</body>


</html>