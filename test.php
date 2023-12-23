<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["favcolor"] = "green";
$_SESSION["favcolor"] = "cat";
echo "Session variables are set.";
echo "Favorite color is " . $_SESSION["favcolor"] . ".<br>";
?>

</body>
</html>