<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ดูอุปกรณ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Custom Login & Register CSS -->
    <link rel="stylesheet" href="custom.css">
</head>
<body>
    <?php include 'navbar.php';?>

      <main class="form-signin w-100 m-auto">
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>ลำดับ</th>
                <th>อุปกรณ์</th>
                <th>จำนวนที่เหลือ</th>
            </thead>

            <tbody>
                <?php 
                    $i=1;
                    include('config.php');

                    $sql = mysqli_query($conn, "SELECT e.equipment_name, e.quantity,COUNT(b.booking_id), COUNT(r.return_id)
                    FROM equipment AS e
                    LEFT JOIN booking AS b ON e.equipment_id = b.equipment_id
                    LEFT JOIN booking_return AS r ON r.booking_id = b.booking_id
                    GROUP BY e.equipment_id;");
                    while($row = mysqli_fetch_array($sql)) {


                ?>

                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['equipment_name']; ?></td>
                        <td><?php echo $row['quantity']-$row['COUNT(b.booking_id)']+$row['COUNT(r.return_id)']; ?></td>
                    </tr>

                <?php 
                    $i++;
                    }
                ?>
            </tbody>
        </table>
      </main>
    
</body>
</html>