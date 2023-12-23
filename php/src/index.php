<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Custom Login & Register CSS -->
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <?php include 'navbar.php';?>

      <main class="form-signin w-100 m-auto">
        <div class="content">
          <?php if(isset($_SESSION['success'])) : ?>
            <div class="success">
              <h3>
                <?php
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                ?>
              </h3>
            </div>
          <?php endif?><br>
          <h2><p align="center">วิธีการจอง</h1></p>
        </div>
        
        

      </main>
      <p align="center">

        <img src="images/1.jpg" width="50%" border="1"><br><br>
        <img src="images/2.jpg" width="50%" border="1"><br><br>
        <img src="images/3.jpg" width="50%" border="1">
      </p>
    
</body>
</html>