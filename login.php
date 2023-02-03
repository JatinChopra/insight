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
    <div class="container">
    <br><br>
    <form>

        <div class="form-group">
      <!-- <label for="StudentEmail" class="form-label mt-4">Student Email address</label> -->
      <input type="email" class="form-control" id="StudentEmail" aria-describedby="emailHelp" placeholder="Enter Student email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <br>
    <div class="form-group">
      <!-- <label for="StudentPassword" class="form-label mt-4">Password</label> -->
      <input type="password" class="form-control" id="StudentPassword" placeholder="Password">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <div id="forgotandlogin">
        <p>Forgot Password</p>
        <p>Sign in</p>
    </div>
    </form>

    
    </div>
    
</body>


</html>