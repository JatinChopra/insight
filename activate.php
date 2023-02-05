<?php

    if(isset($_GET['acode'])){
        $conn = new mysqli("localhost","bob","pass","insight");
        if(!$conn){
            die();
        }
        $acode = $_GET['acode'];
        $sql = "SELECT * from users where activationCode = '$acode'";

        $result = $conn->query($sql);

        if($result->num_rows == 1){
            echo "Account activated";
            $sql = "UPDATE users set activated=1 where activationCode='$acode'";
            $conn->query($sql);
        }else{
            echo "Invalid activation code";
        }
    }
?>