<?php

    if(isset($_GET['acode'])){
        $conn = new mysqli("localhost","bob","pass","insight");
        if(!$conn){
            die();
        }
        $acode = htmlentities($_GET['acode']);
        $sql = "SELECT * from users where activationCode = '$acode'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            
            $sql = "UPDATE users set activated=1 where activationCode='$acode'";
            $conn->query($sql);
            echo "Account activated";   
        }else{
            echo "Invalid activation code";
        }
    }
?>