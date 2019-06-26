<?php
session_start();
include 'dbcon.php';
$empid     = $_POST['uname'];
$bdate     = $_POST['bdate'];
$password  = $_POST['psw'];
$password1 = $_POST['psw1'];

$empid     = mysqli_real_escape_string($db, $empid);
$bdate     = mysqli_real_escape_string($db, $bdate);
$password  = mysqli_real_escape_string($db, $password);
$password1 = mysqli_real_escape_string($db, $password1);

$result = mysqli_query($db, "SELECT bdate FROM employee WHERE empid=$empid") or die('SQL Error: ' . mysqli_error($db));
$row    = mysqli_fetch_array($result);
$dba    = $row[0];

if ($dba == $bdate) {
    if ($password == $password1) {
        $sql = "UPDATE employee set password='$password' where empid=$empid;";

        if ($stmti = mysqli_prepare($db, $sql)) {
            mysqli_stmt_bind_param($stmti, "si", $password, $empid);

            // Attempt to execute the prepared statement
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