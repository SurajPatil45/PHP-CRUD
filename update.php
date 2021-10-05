<?php
    include "config.php";

    if(isset($_POST['update'])){
        $user_id = $_POST['id'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];

        $sql = "UPDATE users set 'firstname'= '$firstname','lastname'= '$lastname','email'= '$email','password'= '$password','gender'= '$gender' where 'id' = '$user_id' ";
   
        $_result = $conn -> query($sql);

        if($result == TRUE){
            echo "Record Updated Successfully";
        }
        else{
            echo "Error:".$sql."<br>".$conn->error;
        }
    }
   
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql = "select * from users where 'id'='$user_id'";

        $result = $conn -> query($sql);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $firstname = $row['fname'];
                $lastname = $row['lname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
                $id = $row['id'];

            }
            ?>
        <!DOCTYPE html>
        <html>
            <body>
                           
            <h2>User Update  Form</h2>
            <form action="" method="POST">
            <fieldset>
                <legend>Personal Information:</legend>
                First Name:<br>
                <input type="text" name="firstname" value="<?php echo $firstname?>">
                <input type="hidden" name="user_id" value="<?php echo $id;?>">
                <br>
                Last Name:<br>
                <input type="text" name="lastname" value="<?php echo $lastname?>">
                <br>
                Email:<br>
                <input type="email" name="email" value="<?php echo $email?>" >
                <br>
                Password:<br>
                <input type="password" name="password" value="<?php echo $password?>">
                <br>
                Gender:<br>
                <input type="radio" name="gender" value="Male" <?php if($gender =='Male') {echo "Checked";}?>> Male
                <input type="radio" name="gender" value="Female" <?php if($gender =='Female') {echo "Checked";}?>> Female
                <br><br>
                <input type="submit" name="update" value="Update">
            </fieldset>

            </form>
            </body>
            </html>
            <?php
        }else{
            header('Location:view.php');
        }
    }

?>