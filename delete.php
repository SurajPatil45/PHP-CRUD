<?php
    include "config.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql ="delete from users where 'id'='$user_id' ";

        $result = $conn -> query($sql);

        if($result == TRUE){
            echo "Record deleted Successfully";
        }
        else{
            echo "Error:".$sql."<br>".$conn->error;
        }

    }

?>