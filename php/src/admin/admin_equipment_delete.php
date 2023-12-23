<?php 

    include_once('../config.php');

    if (isset($_GET['del'])) {
        $equipment_id = $_GET['del'];
        $sql = mysqli_query($conn, "DELETE FROM equipment WHERE equipment_id = '$equipment_id'");

        if ($sql) {
            echo "<script>alert('ลบรายการสำเร็จ');</script>";
            echo "<script>window.location.href='admin_equipment.php'</script>";
        }
    }

?>