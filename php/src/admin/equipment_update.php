<?php 

    include_once('../config.php');

    if (isset($_GET['equipment_update'])) {
        $equipment_id = $_GET['equipment_id'];
        $equipment_name = $_GET['equipment_name'];
        $quantity = $_GET['quantity'];
        $sql =  mysqli_query($conn,"UPDATE equipment SET equipment_id='$equipment_id',equipment_name='$equipment_name',quantity='$quantity' WHERE equipment_id = '$equipment_id'");
        if ($sql) {
            echo "<script>alert('แก้ไขรายการสำเร็จ');</script>";
            echo "<script>window.location.href='admin_equipment.php'</script>";
        }
    }

?>