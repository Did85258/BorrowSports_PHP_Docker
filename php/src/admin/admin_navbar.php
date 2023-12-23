<div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a href="admin.php" class="d-inline-flex link-body-emphasis text-decoration-none">
                SPORT
            </a>
          </div>
    
          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="admin.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="admin_equipment.php" class="nav-link px-2">อุปกรณ์</a></li>
            <li><a href="admin_booking.php" class="nav-link px-2">ยืนยันการจอง</a></li>
            <li><a href="admin_return.php" class="nav-link px-2">การคืนอุปกรณ์</a></li>
            <li><a href="admin_user.php" class="nav-link px-2">User</a></li>

          </ul>
    
          <div class="col-md-3 text-end">
          Username : <strong><?php echo $_SESSION['username']; ?> </strong> &nbsp;
            <button type="button" class="btn btn-outline-primary me-2" onclick="window.location.href='logout.php'">Logout</button>

            
          </div>
        </header>
      </div>