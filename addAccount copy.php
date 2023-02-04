<?php

    $response = "";
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
        

        $response=[
            "email" => $filtered_email,
            "pass" => $pass,
            "username" => $username
        ];

        if($username == ""){ 
            $response = [
                "w_username" => "please provide a valid username"
            ];
        }
        
        if($filtered_email){
            // check if its upes email or not
            $response = [
                "org" => explode("@",$filtered_email)[1],
            ];
            if(explode("@",$filtered_email)[1] === "stu.upes.ac.in"){
                // email is ok
                if(strlen($pass) >=8){
                    // password & email both are ok 
                    // add them to db
                    $response = [
                        // "user" => $username,
                        // "email" => $email,
                        // "pass" => $pass,
                        "success" => "Account Created",
                    ];
                }else{
                    // password len should be greater than 8 
                    $response =[
                        "w_pass" => "Password should at least be 8 characters long."
                    ];
                }
            }else{
                // display that email other than @stu.upes.ac.in not allowed 
                $response =[
                "w_email" => "mail other than @stu.upes.ac.in not allowed"
                ];
            }
        }else{
            $response = [
                "w_email" => "mail other than @stu.upes.ac.in not allowed"
        ];
        }
    }else{
        // provide the data befor submitting
        // email & passwrod field not set  
        $response = [
            "w_nodata" => "Please provide valid input."
        ];
    }

    $response = json_encode($response);
    echo $response;
?>