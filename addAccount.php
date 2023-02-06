<?php
    session_start();
    $username = "";
    $response ="";


    // for handling sing in requests 
    if(isset($_POST['password']) && isset($_POST['username']) && $_POST['username'] != "" && $_POST['password'] !="" && isset($_POST['req']) && $_POST['req'] != "" && $_POST['req'] == "Sign In"){
        try{
        $conn = new mysqli("localhost","bob","pass","insight");
        if(!$conn){
            die();
        }
        // $hashed = password_hash(htmlentities($_POST['password']),PASSWORD_BCRYPT);
        $uname = $_POST['username'];
        $sql = "SELECT * from users where username='$uname'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $original_pass = $row['passphrase'];


        if (password_verify($_POST['password'], $original_pass)) {
            $_SESSION['user'] = $uname;
            $data = array("Invalid Password or username.","index.php");
            $data = json_encode($data);
            echo $data;
            // echo 'Password is valid!';
            // header('location: index.php');
            // header('Location: index.php');
        } else {
            $data = array('Invalid Password or username.','');
            $data = json_encode($data);
            echo $data;

        }
        
        // foreach ($row as $key => $value){
        // echo '<<<'.$row['passphrase'].'>>>>>>>';
        
        // }
        // if($result->num_rows == 1){
        //     $response = "found user , logging in.";
        // }else{
        //     $response = "wrong username or password.";
        // }
        }catch(Exception $e){echo $e;}
        echo $response;
    }

    // for handling sign up requests  
    else if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username']) && $_POST['username'] != "" && $_POST['email'] != "" && $_POST['password'] !="" && isset($_POST['req']) && $_POST['req'] != "" && $_POST['req'] == "Sign Up"){
        $username = $_POST['username'];
        $email = htmlentities($_POST['email']);
        $pass = htmlentities($_POST['password']);
        $filtered_email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        

        // filtering username 
        $whiteSpace = '';  //if you dnt even want to allow white-space set it to ''
        $pattern = '/[^a-zA-Z0-9_'  . $whiteSpace . ']/u';
        $username = preg_replace($pattern, '', (string) $username);
        

        // $response="nosuccess";
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
                    // $response = "Account Created";
                    // echo $username;
                    // echo $filtered_email;
                    $hashedpass = password_hash($pass,PASSWORD_BCRYPT);
                    $activationCode = hash('crc32',$username);
                    // echo $hashedpass;

                    addtoDb($username, $filtered_email,$hashedpass,$activationCode);
                    // sendActivationEmail($filtered_email, $activationCode);



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
        echo $response;
    }else{
        // provide the data befor submitting
        // email & passwrod field not set  
        $response = "Please provide valid input.";
        echo $response;
    }


//  if(!filter_has_var(INPUT_POST,'password') &&  !filter_has_var(INPUT_POST,'email') && !filter_has_var(INPUT_POST,'username') ){
//              $response ="";
//              echo $response;
//         }else{
//             echo $response;
//         }

    // for adding database to db
    function addtoDb($username,$email,$pass,$acode){
        // creating a connection
        // $conn = new mysqli("localhost","id20222037_bob","P@ssword000_","id20222037_insight"); // for webhost
        $conn = new mysqli("localhost","bob","pass","insight"); // for localhost
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Check connection
        // if ($conn -> connect_errno) {
        // echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        // exit();
        // }


        
    try{
        $sql0 = "SELECT username from users where username='$username';";

        $result = mysqli_query($conn,$sql0);
        if(mysqli_num_rows($result) > 0){
            $response = "The username had already been taken.";
        }else{

        $sql = "INSERT INTO users (username, email, passphrase, activated, activationCode) VALUES ('$username','$email','$pass',0,'$acode');";

        if (mysqli_query($conn, $sql)) {
            // Add the new record and send activation email
            // echo "New record created successfully";
             $response ="";
             sendActivationEmail($email,$acode);   

        } else {
            // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            $response = "Please wait ....".mysqli_error($conn);
        }
        }
        echo $response;
    }catch(Exception $e){
        echo $e;
    }
        mysqli_close($conn);
}


    function sendActivationEmail($to, $acode){
        try{

$subject = "Activation Code";
$acode = "Activation code : ".$acode;


mail($to,$subject,$acode);
        }catch(Exception $e){ echo $e; }
        $response = "Activation Code Send. Please paste the code in the below field to activae your account.";
        echo $response;
    }
?>
