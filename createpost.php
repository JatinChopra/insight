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
     <!-- <?php 
        if(isset($_SESSION['user'])){
            echo '<h1>Welcome '.$_SESSION['user'].'</h1>';
        }
     ?> -->
    <div class="container">
     <form>
  <fieldset>
    <legend style="margin-top:20px;"><h1>Create Post</h1></legend>
    <div id="alertbox" hidden="true">
     <div class="alert alert-dismissible alert-success">
             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
   <p style="display:inline">Some text here</p>
    </div>
    </div>
    <div class="form-group">
      <input class="form-control" id="heading" type="text" placeholder="Title of Post... ">
      <label for="description" class="form-label mt-2">Description</label>
      <textarea class="form-control" id="description" rows="3" ></textarea>
    </div>
    
  </fieldset>
</form>
<button id="submitbutton" type="submit" class=" mt-3 btn btn-primary">Submit</button>

</div>

<script>
    let button = document.querySelector("#submitbutton");
    button.addEventListener('click',addPost);

    function addPost(){
        let heading = document.querySelector("#heading").value;
        let description = document.querySelector("#description").value;
        let uname = "<?php echo $_SESSION['user']; ?>";

        console.log(heading);
        console.log(description);
        console.log(uname);
        
        let data = "heading="+window.encodeURIComponent(heading)    
        +"&description="+window.encodeURIComponent(description)
        +"&uname="+window.encodeURIComponent(uname);



        var xhr = new XMLHttpRequest();

        xhr.open("POST","./addFeed.php",true);

        xhr.onload = function(){
                document.querySelector("#alertbox").removeAttribute('hidden');
             if(this.responseText == "Post uploaded"){ 
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-success");
                }else{
                    document.querySelector("#alertbox>div").setAttribute("class","alert alert-dismissible alert-danger");
                }
                document.querySelector("#alertbox p").textContent = this.responseText ; 


        };
 xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
        xhr.send(data);

    }

            let alertboxbutton = document.querySelector("#alertbox button");
   
        
        alertboxbutton.addEventListener('click',function(){
            document.querySelector("#alertbox").setAttribute("hidden",true);
        });

</script>



</body>


</html>