<?php
    if(isset($_POST['uname']) && isset($_POST['description']) && isset($_POST['heading']) && $_POST['uname'] != '' && $_POST['heading'] != ''){

        $heading = htmlentities($_POST['heading']); 
        $description = htmlentities($_POST['description']);
        $uname = htmlentities($_POST['uname']);
        $conn = new mysqli("localhost","bob","pass","insight");

        if(!$conn){
            die();
        }

        $sql = "SELECT * FROM users WHERE username = '$uname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $activated = $row['activated'];

        if($activated == 0){
            echo "Account not activated.";
        }else{

        $sql = "INSERT into posts(heading,postdesc,userid) values('$heading','$description','$id')";

            $conn->query($sql);

            echo "Post uploaded";
        } 
    }else{
        if(!isset($_POST['uname']) || $_POST['uname'] == ''){
            echo "You need to have an account in order create a post.";
        }else{
            echo "Post Title is required.";
        }
    }
?>