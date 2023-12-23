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
    <title>อุปกรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Custom Login & Register CSS -->
    <link rel="stylesheet" href="custom.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?php include 'admin_navbar.php'; ?>
                <p>
                    <a href="admin_equipment_add.php" class="btn btn-outline-primary me-2">เพิ่มอุปกรณ์</a>
                </p>
                <table id="mytable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <th width="5%">ลำดับ</th>
                        <th>อุปกรณ์</th>
                        <th>จำนวน</th>
                        <th width="5%">แก้ไข</th>
                        <th width="5%">ลบ</th>
                    </thead>

                    <tbody>
                        <?php
                        include('../config.php');
                        $username = $_SESSION['username'];
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM equipment ");
                        while ($row = mysqli_fetch_array($sql)) {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $row['equipment_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['quantity']; ?>
                                </td>
                                <td><a href="admin_equipment_edit.php?edit=<?php echo $row['equipment_id']; ?>" class="btn btn-outline-primary me-2">แก้ไข</a></td>
                                <td><a href="admin_equipment_delete.php?del=<?php echo $row['equipment_id']; ?>" class="btn btn-outline-primary me-2">ลบ</a></td>
                            </tr>

                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>