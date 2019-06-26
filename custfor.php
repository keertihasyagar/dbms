<?php
session_start();
include 'dbcon.php';
$custid    = $_POST['uname'];
$bdate     = $_POST['bdate'];
$password  = $_POST['psw'];
$password1 = $_POST['psw1'];

$custid    = mysqli_real_escape_string($db, $custid);
$bdate     = mysqli_real_escape_string($db, $bdate);
$password  = mysqli_real_escape_string($db, $password);
$password1 = mysqli_real_escape_string($db, $password1);

$result = mysqli_query($db, "SELECT bdate FROM customer WHERE custid=$custid") or die('SQL Error: ' . mysqli_error($db));
$row    = mysqli_fetch_array($result);
$dba    = $row[0];

if ($dba == $bdate) {
    if ($password == $password1) {
        $sql = "UPDATE customer set password='$password' where custid=$custid;";

        if ($stmti = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmti, "si", $password, $custid);

            if (mysqli_stmt_execute($stmti)) {
                header("Location: index.php");
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($db);
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($db);
        }
    } else {
        echo "Passwords don't match";
    }
} else {
    echo "Birth date doesn't match with records or Username entered is wrong";
}

mysqli_close($db);
?>