<?php 

    include_once('../config.php');

    if (isset($_GET['del'])) {
        $user_id = $_GET['del'];
        $sql = mysqli_query($conn, "DELETE FROM user WHERE user_id = '$user_id'");

        if ($sql) {
            echo "<script>alert('ลบรายการสำเร็จ');</script>";
            echo "<script>window.location.href='admin_user.php'</script>";
        }
    }

?>