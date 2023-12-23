<?php 

    include_once('../config.php');

    if (isset($_GET['status'])) {
        $booking_id = $_GET['status'];
        $sql =  mysqli_query($conn,"UPDATE booking SET status_borrow_id=2 WHERE booking_id = '$booking_id'");
        if ($sql) {
            echo "<script>alert('ยืนยันการยืม');</script>";
            echo "<script>window.location.href='admin_booking.php'</script>";
        }
    }

?>