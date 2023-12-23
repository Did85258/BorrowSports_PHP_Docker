<?php 

    include_once('../config.php');
    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");
    $time = date("H:i:s");

    if (isset($_GET['return'])) {
        $booking_id = $_GET['return'];
        $sql = mysqli_query($conn, "INSERT INTO booking_return (return_date, return_time, booking_id) VALUE ('$date', '$time', '$booking_id')");
        if ($sql) {
            echo "<script>alert('ยืนยันการคืนสำเร็จ');</script>";
            echo "<script>window.location.href='admin_return.php'</script>";
        }
    }

?>