<?php
           session_start();
           include('ser.php');

           $errors = array();

           if (isset($_POST['reg'])) {
         
            $Phone = mysqli_real_escape_string($conn, $_POST['Phone_cus']);
            $name = mysqli_real_escape_string($conn, $_POST['name_cus']);
            $sur = mysqli_real_escape_string($conn, $_POST['sur_cus']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);
            $username = mysqli_real_escape_string($conn, $_POST['Username']);
            $password = mysqli_real_escape_string($conn, $_POST['Password']);
   
           
           $userF="SELECT * FROM customer WHERE Username='$username' OR Phone_cus='$Phone' OR `Password`='$password' LIMIT 1";
           $ry = mysqli_query($conn, $userF);
            $result = mysqli_fetch_assoc($ry);

        if ($result) { 
            if ($result['Username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['Phone_cus'] === $Phone) {
                array_push($errors, "Phonenumber already exists");
            }
            if ($result['Password'] === $password) {
                array_push($errors, "Password already exists");
            }
        }
    }
        if (count($errors) == 0) {
            $password1 = md5($password);

            $sql ="INSERT INTO customer VALUES ('$Phone','$name','$sur','0','user','$address','$username','$password',NULL)";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            header('location: ../../index.php');
        } else {
            header("location: regis.php");
        }
        

?>