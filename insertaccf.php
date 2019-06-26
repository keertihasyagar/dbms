<?php
session_start();
include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);
$custid   = mysqli_real_escape_string($db, $_POST['custid']);
$balance  = mysqli_real_escape_string($db, $_POST['balance']);
$accno    = mysqli_real_escape_string($db, $_POST['accno']);
$interest = "4.5%";
$interest = mysqli_real_escape_string($db, $interest);
$empid    = $_SESSION['empid'];
$empid    = mysqli_real_escape_string($db, $empid);
$accn = (string)$accno;
$result1 = mysqli_query($db, "SELECT * FROM employee WHERE empid = '$empid'")
or die('SQL Error: ' . mysqli_error($db));
$row1 = mysqli_fetch_array($result1);
$ifsc = $row1['ifsc'];
$ifsc = mysqli_real_escape_string($db, $ifsc);

// Attempt insert query execution
$sql = "INSERT INTO account VALUES ('$accno', '$balance', '$interest','$custid','$ifsc')";
if (substr($accn, 0, 4)==substr($ifsc, -4)) {
    if ($stmt = mysqli_prepare($db, $sql)) {
        mysqli_stmt_bind_param($stmt, "ississs", $accno, $balance, $interest, $custid, $ifsc);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            header("Location: tabs10.php");
        } else {
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($db);
        }
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($db);
    }
} else {
    echo "starting 4 digits of account number do not match last 4 digits of ifsc";
}
// Close statement
mysqli_stmt_close($stmt);
mysqli_close($db);
