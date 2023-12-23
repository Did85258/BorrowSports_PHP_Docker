<?php 

    include_once('config.php');

    if (isset($_GET['del'])) {
        $booking_id = $_GET['del'];
        $sql = mysqli_query($conn, "DELETE FROM booking WHERE booking_id = '$booking_id'");

        if ($sql) {
            echo "<script>alert('ยกเลิกรายการสำเร็จ');</script>";
            echo "<script>window.location.href='mybooking.php'</script>";
        }
    }

?>