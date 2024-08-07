<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/vapor/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/5/quartz/bootstrap.min.css">

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
        #button{
            width:100%;
            border:none;
        }
        #forgotandlogin{
            display:flex;
            justify-content:space-between;
            padding-top:8px;
        }

    </style>


</head>

<body>
    <div class="container">
    <br><br>
   
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
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else. Never </small>
    </div>
    <br>
    <div class="form-group">
      <!-- <label for="StudentPassword" class="form-label mt-4">Password</label> -->
      <input type="password" class="form-control" id="StudentPassword" placeholder="Password">
    </div>
    <div id="acode" hidden="true" class="form-group">
      <input type="text" class="form-control" id="acodeinp" placeholder="Activation Code">
    </div>
    <br>
    <button id="button" type="button" value="Signup" class="btn btn-primary wrapper">Sign Up</button>
    <div id="forgotandlogin">
    <button id="forgotlink" type="button" class="btn btn-link" style="margin:0; padding:0; text-align:left;">Forgot Password</button>
    <button id="signinlink" type="button" class="btn btn-link"  style="margin:0; padding:0; text-align:right;">Sign In</button>
  
    </div>
    </form>
    </div>
    <script>

        let submitbutton = document.querySelector("#button");
        let signinlink = document.querySelector("#signinlink")
        let alertboxbutton = document.querySelector("#alertbox button");
        let studentEmail = document.querySelector("#StudentEmail")
        let emailHelp = document.querySelector("#emailHelp");
        let userName = document.querySelector("#username");
        let passphrase = document.querySelector("#StudentPassword");
        


        submitbutton.addEventListener('click',selectFunction);
        signinlink.addEventListener('click',switchToLogin);
        alertboxbutton.addEventListener('click',function(){
            document.querySelector("#alertbox").setAttribute("hidden",true);
        });

        <?php if(isset($_GET['q']) && $_GET['q'] == 'login'):?>
            switchToLogin();
        <?php endif;?>



        function selectFunction(){
            let submitText = submitbutton.textContent;
            if(submitText == "Sign Up"){
                adduser();
            }else if(submitText == "Sign In"){
                signIn();
            }else if(submitText == "Activate"){
                activationCodeCheck();
            }
        
        }


        function switchToLogin(){
            console.log(signinlink.textContent);
            if(signinlink.textContent == "Sign In"){
            studentEmail.setAttribute('hidden','true');
            emailHelp.setAttribute('hidden','true');
            submitbutton.textContent="Sign In";
            signinlink.textContent="Sign Up";}else{
            studentEmail.removeAttribute('hidden');
            emailHelp.removeAttribute('hidden');
            submitbutton.textContent="Sign Up";
            signinlink.textContent="Sign In";
            }

        }

        function signIn(){
            let username = document.querySelector("#username").value;
            // let email = studentEmail.value;
            let pass = document.querySelector("#StudentPassword").value;
            let req = submitbutton.textContent;
            let data = "password="+window.encodeURIComponent(pass)
            + "&username="+window.encodeURIComponent(username)
            +"&req="+window.encodeURIComponent(req);
            
            var xhr = new XMLHttpRequest();

            xhr.open("POST","./addAccount.php",true);

            xhr.onload=function(){
            if(this.responseText == 'Please provide valid input.'){
                document.querySelector("#alertbox").removeAttribute('hidden');
                     document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                     document.querySelector("#alertbox p").textContent = this.responseText; 
            }else{
                let data = JSON.parse(this.responseText);
                console.log(data[0]);
                if(data[1] === ''){
                    document.querySelector("#alertbox").removeAttribute('hidden');
                     document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                     document.querySelector("#alertbox p").textContent = data[0]; 
                }else{
                    window.location = '/'+data[1];
                }
                
            }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");            
            xhr.send(data);       
        }

        function activationCodeCheck(){
            console.log("Activation button pressed.");
            let acodeinp = document.querySelector("#acodeinp");
            console.log(acodeinp.value);

            let xhr = new XMLHttpRequest();
            xhr.open("GET","./activate.php?acode="+acodeinp.value,true);
            xhr.onload=function(){
                console.log(this.responseText);
                if(this.responseText == "Account activated"){ 
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-success");
                }else{
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                }
                document.querySelector("#alertbox p").textContent = this.responseText + " Now you can sign in and create posts."; 
            }

            xhr.send();
        
            
        }

        function adduser(){
            let username = document.querySelector("#username").value;
            let email = studentEmail.value;
            let pass = document.querySelector("#StudentPassword").value;
            let req = submitbutton.textContent;
            let data = "email="+window.encodeURIComponent(email)
            + "&password="+window.encodeURIComponent(pass)
            + "&username="+window.encodeURIComponent(username)
            +"&req="+window.encodeURIComponent(req);
            
            var xhr = new XMLHttpRequest();

            xhr.open("POST","./addAccount.php",true);

            xhr.onload=function(){
                
                // alert(this.responeText.length);
                console.log(this.responseText);
                document.querySelector("#alertbox").removeAttribute("hidden");
                if(this.responseText == "Activation Code Send. Please paste the code in the below field to activae your account."){
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-success");
                    userName.setAttribute('hidden',"true");
                    studentEmail.setAttribute('hidden',"true");
                    passphrase.setAttribute('hidden',"true");
                    document.querySelector('#acode').removeAttribute('hidden');
                    emailHelp.setAttribute('hidden','true');
                    submitbutton.textContent="Activate";

                }else{
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                }
                document.querySelector("#alertbox p").textContent = this.responseText; 
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");            
            xhr.send(data);
        }




        
    </script>
</body>


</html>
