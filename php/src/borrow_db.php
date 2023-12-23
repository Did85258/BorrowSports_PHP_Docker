<?php
    session_start();
    include('config.php');
    $errors = array();
    
        if (isset($_POST['borrow'])){
            $username = $_SESSION['username'];
            $date = mysqli_real_escape_string($conn, $_POST['date']);
            $time_borrow = mysqli_real_escape_string($conn, $_POST['time_borrow']);
            $equipment_id = mysqli_real_escape_string($conn, $_POST['equipment']);
    
            $sql= "SELECT * FROM user WHERE username = '$username'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $user_id = $result['user_id'];
            // echo $result['user_id'];
    
            $sql = "SELECT COUNT(b.booking_id) FROM booking AS b WHERE equipment_id = '$equipment_id' GROUP BY b.equipment_id";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            if($result!=NULL){
                $quantity_booking = $result['COUNT(b.booking_id)'];
            }else{
                $quantity_booking = 0;
            }
            
            // echo $quantity_booking;
    
            $sql = "SELECT COUNT(b.booking_id) FROM booking_return AS r INNER JOIN booking AS b ON r.booking_id = b.booking_id WHERE b.equipment_id = '$equipment_id' GROUP BY b.equipment_id";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            if($result!=NULL){
                $quantity_return = $result['COUNT(b.booking_id)'];
            }else{
                $quantity_return = 0;
            }
            // echo $quantity_return;
    
            $sql= "SELECT * FROM equipment WHERE equipment_id = '$equipment_id'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_assoc($query);
            $equipment_quantity = $result['quantity'];
            // echo $equipment_quantity, $quantity_booking,$quantity_return;
            if($equipment_quantity>$quantity_booking-$quantity_return){
                $sql = "INSERT INTO booking (date, time, equipment_id, user_id, status_borrow_id) VALUE ('$date', '$time_borrow', '$equipment_id', '$user_id', 1)";
                mysqli_query($conn, $sql);
                echo "<script>alert('จองสำเร็จ');</script>";
                echo "<script>window.location.href='borrow.php'</script>";
            } else{
                $_SESSION['error'] = "ยืมไม่สำเร็จ";
                echo "<script>alert('จองไม่สำเร็จ');</script>";
                echo "<script>window.location.href='borrow.php'</script>";
            }
        

        // $_SESSION['username'] = $username;
        // $_SESSION['success'] = "You are now logged in";
        // header('location: index.php');


    }

?>