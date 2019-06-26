<?php
include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);
$custid = mysqli_real_escape_string($db, $_POST['custid']);
$sql    = "DELETE FROM customer WHERE custid=$custid";
if (mysqli_query($db, $sql)) {
    header("Location: tabs10.php");
} else {
    echo "Error deleting record: " . mysqli_error($db);
}
mysqli_close($db);
?>