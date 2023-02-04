<?php

    $username = "";
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && $_POST['username'] != "" && $_POST['email'] != "" && $_POST['password'] !=""){
        $username = $_POST['username'];
        $email = htmlentities($_POST['email']);
        $pass = htmlentities($_POST['password']);
        $filtered_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        

        // filtering username 
        $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
        $pattern = '/[^a-zA-Z0-9_'  . $whiteSpace . ']/u';
        $username = preg_replace($pattern, '', (string) $username);
        

        $response="nosuccess";
        // echo $username;

        if($username == ""){ 
            $response = "please provide a valid username";
        }
        
        if($filtered_email){
            // check if its upes email or not
            $id =  explode('@',$filtered_email)[0];
            if(explode("@",$filtered_email)[1] === "stu.upes.ac.in" && preg_match("/^\d+$/", $id)){
                // email is ok
                if(strlen($pass) >=8){
                    // password & email both are ok 
                    // add them to db
                    $response = "Account Created";
                    echo $username;
                    echo $filtered_email;
                    $hashedpass = password_hash($pass,PASSWORD_BCRYPT);
                    echo $hashedpass;

                    addtoDb($username, $filtered_email,$hashedpass);



                }else{
                    // password len should be greater than 8 
                    $response = "Password should at least be 8 characters long.";
                }
            }else{
                // display that email other than @stu.upes.ac.in not allowed 
                $response ="SAP ID or org. name invalid.";
            }
        }else{
            $response ="SAP ID or org. name invalid.";
        }
    }else{
        // provide the data befor submitting
        // email & passwrod field not set  
        $response = "Please provide valid input.";

    }
 if(!filter_has_var(INPUT_POST,'password') &&  !filter_has_var(INPUT_POST,'email') && !filter_has_var(INPUT_POST,'username') ){
             $response ="";
             echo $response;
        }else{
            echo $response;
        }
   

    // for adding database to db
    function addtoDb($username,$email,$pass){
        // creating a connection
        $mysqli = new mysqli("localhost","bob","pass","insight");

        // Check connection
        if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
        }


        // $sql = "SELECT * FROM users";
        // $result = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($result) > 0) {
        //     // output data of each row
        //     while($row = mysqli_fetch_assoc($result)) {
        //         echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. " ".$row["password"]." ". $row["activated"]."<br>";
        //     }
        // } else {
        //         echo "0 results";
        // }

mysqli_close($mysqli);


    }
?>
