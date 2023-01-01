<?php 
    session_start();
    include('ser.php');

        $username = mysqli_real_escape_string($conn, $_POST['Username']);
        $password = mysqli_real_escape_string($conn, $_POST['Password']);

        
            $password1 = md5($password);
            $ry = "SELECT * FROM customer WHERE Username = '$username' AND `Password` = '$password' ";
            $result = mysqli_query($conn, $ry);

            if (mysqli_num_rows($result) == 1 ) {

                $row= mysqli_fetch_array($result);

                if($row['role'] =='user'){
                    if (!empty($_POST['remember'])) {
                        setcookie('usergin', $_POST['Username'], time() + (10 * 365 * 24 * 60 * 60));
                        setcookie('userword', $_POST['Password'], time() + (10 * 365 * 24 * 60 * 60));
                    } else {
                        if (isset($_COOKIE['usergin'])) {
                            setcookie('usergin', '');
                              if (isset($_COOKIE['userword'])) {
                                setcookie('userword', '');
                            }
                        }
                    }
                $_SESSION['username'] = $username;
                $_SESSION['Phone'] = $row["Phone_cus"];
                $_SESSION['success'] = "Your are now logged in";
                header("location:../../index.php ");
                }if($row['role'] =='admin'){
                $_SESSION['username'] = $username;
                $_SESSION['success'] = "Your are now logged in";
                header("location: admin.php");}
            }
            else {
                header("location: log.php");
            }
?>