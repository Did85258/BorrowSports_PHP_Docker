<?php
    session_start();

    include('config.php');
    $errors = array();

    if(isset($_POST['login_user'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1){
                if($username =="admin"){
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your are now logged in";
                    header("location: admin/admin.php");
                }else{
                    $_SESSION['username'] = $username;
                    $_SESSION['success'] = "Your are now logged in";
                    header("location: index.php");
                }
                
                
            } else{
                array_push($errors, "wrong username/password combination");
                $_SESSION['error'] = "wrong username or password try again!";
                header("location: login.php");
            }
        }
    }
?>