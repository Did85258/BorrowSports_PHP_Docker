<?php
  session_start();
  include('config.php');
  // if(!isset($_SESSION['username'])){
  //   $_SESSION['msg'] = "You must login first";
  //   header('location: login.php');
  // }  
  if (isset($_SESSION['username'])) {
    header("location:index.php");
    
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>เข้าสู่ระบบ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Custom Login & Register CSS -->
    <link rel="stylesheet" href="custom.css">
</head>
  <body>
    <?php include 'navbar.php';?>


      <main class="form-signin w-100 m-auto">
        <?php if(isset($_SESSION['error'])) : ?>
            <div class="error">
              <h3>
                <?php
                  echo $_SESSION['error'];
                  unset($_SESSION['error']);
                  
                ?>
              </h3>
            </div>
          <?php 
          endif 
          ?>
        <form action="login_db.php" method="post">
          <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      
          <div class="form-floating my-2">
            <input name="username" type="text" class="form-control" placeholder="Username" required>
            <label for="floatingInput">Username</label>
          </div>
          <div class="form-floating my-2">
            <input name="password" type="password" class="form-control" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
          </div>
      
          <button name="login_user" class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
      </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>