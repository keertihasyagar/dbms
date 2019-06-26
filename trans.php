<?php
session_start();
include 'dbcon.php';
error_reporting(E_ALL ^ E_WARNING);

$amount = mysqli_real_escape_string($db, $_POST['amount']);
$taccno = mysqli_real_escape_string($db, $_POST['taccno']);
$custid = $_SESSION['custid'];
$custid = mysqli_real_escape_string($db, $custid);
$accno  = $_SESSION['accno'];
$accno  = mysqli_real_escape_string($db, $accno);
$date   = date("Y/m/d");
$result = mysqli_query($db, "SELECT balance FROM account WHERE accno = '$accno'")
or die('SQL Error: ' . mysqli_error($db));
$row  = mysqli_fetch_array($result);
$abal = $row[0];
if ($amount > $abal) {
    echo "enter an amount less than your current balance $abal";
} else {
    $sql = "INSERT into transaction(transdate,amount,custid,accno,to_acc) VALUES ('$date','$amount','$custid','$accno','$taccno')";
    if ($stmt = mysqli_prepare($db, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssss", $date, $amount, $custid, $accno, $taccno);
        if (mysqli_stmt_execute($stmt)) {
            $sqli = "UPDATE account set balance= balance+$amount where accno=$taccno";
            if ($stmti = mysqli_prepare($db, $sqli)) {
                mysqli_stmt_bind_param($stmti, "s", $amount);
                if (mysqli_stmt_execute($stmti)) {
                    header("Location: tabs1.php");
                } else {
                    echo "ERROR: 1Could not execute query: $sqli. " . mysqli_error($db);
                }
            } else {
                echo "ERROR: 2Could not prepare query: $sqli. " . mysqli_error($db);
            }
        } else {
            echo "ERROR: 3Could not execute query: $sql. " . mysqli_error($db);
        }
    } else {
        echo "ERROR: 4Could not prepare query: $sql. " . mysqli_error($db);
    }
}
