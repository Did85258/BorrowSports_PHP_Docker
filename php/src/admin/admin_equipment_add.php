<?php 
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must login first";
        header('location: ../login.php');
    }
    if($_SESSION['username']!= "admin"){
        header('location: ../index.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มอุปกรณ์</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">เพิ่มอุปกรณ์</h1>
        <hr>
        <?php 
            include_once('../config.php');
            $sql = mysqli_query($conn, "SELECT MAX(equipment_id) FROM equipment;");
            $row = mysqli_fetch_array($sql);
        ?>

        <form action="equipment_add.php" method="get">
            <div class="mb-3">
                <label for="user" class="form-label">ID</label>
                <input type="int" class="form-control" name="equipment_id" 
                    value="<?php echo $row['MAX(equipment_id)']+1; ?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">อุปกรณ์</label>
                <input type="text" class="form-control" name="equipment_name" required>
            </div>
            <div class="mb-3">
                <label for="int" class="form-label">จำนวน</label>
                <input type="int" class="form-control" name="quantity" required>
            </div>
            <button type="submit" name="equipment_add" class="btn btn-success" >Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>