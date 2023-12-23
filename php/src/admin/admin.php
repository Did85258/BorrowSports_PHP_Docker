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
    <title>Home</title>
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
                <table id="mytable" class="table table-bordered table-striped table-hover">
                    <thead>
                        <th width="5%">ลำดับ</th>
                        <th>วันที่ยืม</th>
                        <th>เวลายืม</th>
                        <th>อุปกรณ์</th>
                        <th>Username</th>
                        <th>สถานะการยืม</th>
                        <th>วันที่คืน</th>
                        <th>เวลาคืน</th>
                        <th>สถานะการคืน</th>
                    </thead>

                    <tbody>
                        <?php
                        include('../config.php');
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM booking AS b INNER JOIN equipment AS e ON e.equipment_id = b.equipment_id INNER JOIN status_borrow AS sb ON sb.status_borrow_id = b.status_borrow_id INNER JOIN user AS u ON u.user_id = b.user_id LEFT JOIN booking_return AS r ON r.booking_id = b.booking_id ORDER BY date DESC");
                        while ($row = mysqli_fetch_array($sql)) {
                                ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                <td>
                                    <?php echo $row['date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['time']; ?>
                                </td>
                                <td>
                                    <?php echo $row['equipment_name']; ?>
                                </td>
                                <td>
                                    <?php echo $row['username']; ?>
                                </td>
                                <td>
                                    <?php echo $row['status_borrow']; ?>
                                </td>
                                <td>
                                    <?php echo $row['return_date']; ?>
                                </td>
                                <td>
                                    <?php echo $row['return_time']; ?>
                                </td>
                                <td><?php 
                                    if(isset($row['return_id'])){
                                        echo "คืนแล้ว";
                                    } else{
                                        echo "ยังไม่คืน";
                                    }
                                ?></td>
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