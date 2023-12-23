<?php
    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must login first";
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จองอุปกรณ์</title>
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
        <?php endif?>
        <?php if(isset($_SESSION['success'])) : ?>
            <div class="success">
              <h3>
                <?php
                  echo $_SESSION['success'];
                  unset($_SESSION['success']);
                ?>
              </h3>
            </div>
          <?php endif?>
        <div class="content">
            <form action="borrow_db.php" method="post">
            <h1 class="h3 mb-3 fw-normal">จองอุปกรณ์</h1>
        
            <div class="form-floating my-2">
                <input name="date" type="date" class="form-control" placeholder="date" required>
                <label for="floatingInput">วันที่</label>
            </div>
            <div class="form-floating my-2">
                <select name="time_borrow" id="cars"  class="form-control" required>
                    <option value="">--เลือกเวลา--</option>
                    <option value="09:00:00">09:00:00</option>
                    <option value="10:00:00">10:00:00</option>
                    <option value="11:00:00">11:00:00</option>
                    <option value="12:00:00">12:00:00</option>
                    <option value="13:00:00">13:00:00</option>
                    <option value="14:00:00">14:00:00</option>
                    <option value="15:00:00">15:00:00</option>
                    <option value="16:00:00">16:00:00</option>
                    <option value="17:00:00">17:00:00</option>
                    <option value="18:00:00">18:00:00</option>
                    <option value="19:00:00">19:00:00</option>
                    <option value="20:00:00">20:00:00</option>
                </select>
                <label for="floatingInput">เวลายืม</label>
            </div>
            <div class="form-floating my-2">
                <select name="equipment" id="cars"  class="form-control" required>
                    <option value="">--เลือกอุปกรณ์--</option>
                    <option value="1">ลูกฟุตบอล</option>
                    <option value="2">ลูกฟุตซอล</option>
                    <option value="3">ลูกบาส</option>
                    <option value="4">ลูกวอลเลย์บอล</option>
                </select>
                <label for="floatingPassword">อุปกรณ์กีฬา</label>
            </div>
        
            <button name="borrow" class="btn btn-primary w-100 py-2" type="submit">ยืนยันการจอง</button>
            </form>
        </div>
      </main>
    
</body>
</html>