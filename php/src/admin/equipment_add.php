<?php 

    include_once('../config.php');

    if (isset($_GET['equipment_add'])) {
        $equipment_id = $_GET['equipment_id'];
        $equipment_name = $_GET['equipment_name'];
        $quantity = $_GET['quantity'];
        $sql = mysqli_query($conn, "INSERT INTO equipment (equipment_id, equipment_name, quantity) VALUE ('$equipment_id', '$equipment_name', '$quantity')");
        if ($sql) {
            echo "<script>alert('เพิ่มรายการสำเร็จ');</script>";
            echo "<script>window.location.href='admin_equipment.php'</script>";
        }
    }

?>