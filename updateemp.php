<?php
session_start();
include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);
$empid             = mysqli_real_escape_string($db, $_SESSION['empid']);
$name              = mysqli_real_escape_string($db, $_POST['name']);
$address           = mysqli_real_escape_string($db, $_POST['address']);
$phone             = mysqli_real_escape_string($db, $_POST['phone']);
$mail  = mysqli_real_escape_string($db, $_POST['mail']);
$bdate = mysqli_real_escape_string($db, $_POST['bdate']);
// Attempt insert query execution
$sqli = "UPDATE employee set name='$name', address='$address', phone=$phone, email='$mail', bdate='$bdate' where empid='$empid'";
if ($stmti = mysqli_prepare($db, $sqli)) {
    mysqli_stmt_bind_param($stmti, "ississ", $empid, $name, $address, $phone, $mail, $bdate);

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmti)) {
        header("Location: tabs10.php");
    } else {
        echo "ERROR: Could not execute query: $sqli. " . mysqli_error($db);
    }
} else {
    echo "ERROR: Could not prepare query: $sqli. " . mysqli_error($db);
}

// Close statement
mysqli_stmt_close($stmti);
mysqli_close($db);
