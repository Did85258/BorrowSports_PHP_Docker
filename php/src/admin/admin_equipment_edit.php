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
    <title>แก้ไขอุปกรณ์</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">แก้ไขอุปกรณ์</h1>
        <hr>
        <?php 
            include_once('../config.php');
            if (isset($_GET['edit'])) {

                $equipment_id = $_GET['edit'];
                $sql = mysqli_query($conn, "SELECT * FROM equipment WHERE equipment_id = '$equipment_id'");
                $row = mysqli_fetch_array($sql);
            }
        ?>

        <form action="equipment_update.php" method="get">
            <div class="mb-3">
                <label for="user" class="form-label">First name</label>
                <input type="int" class="form-control" name="equipment_id" 
                    value="<?php echo $row['equipment_id']; ?>" readonly required>
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="equipment_name"
                    value="<?php echo $row['equipment_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email">Email</label>
                <input type="int" class="form-control" name="quantity" 
                    value="<?php echo $row['quantity']; ?>" required>
            </div>
            <button type="submit" name="equipment_update" class="btn btn-success" >Update</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    
</body>
</html>