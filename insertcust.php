<?php
session_start();
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE);
include 'dbcon.php';
$_SESSION['cusid'] = $_POST['custid'];
$custid            = mysqli_real_escape_string($db, $_SESSION['cusid']);
$name              = mysqli_real_escape_string($db, $_POST['name']);
$address           = mysqli_real_escape_string($db, $_POST['address']);
$phone             = mysqli_real_escape_string($db, $_POST['phone']);
$mail              = mysqli_real_escape_string($db, $_POST['mail']);
$bdate             = mysqli_real_escape_string($db, $_POST['bdate']);
function random_password($length = 10)
{
    $chars       = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
    $alphabet    = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass        = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n      = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
$psw = random_password(10);
$psw = mysqli_real_escape_string($db, $psw);

$balance  = mysqli_real_escape_string($db, $_POST['balance']);
$accno    = mysqli_real_escape_string($db, $_POST['accno']);
$accn = (string)$accno;
$interest = "4.5%";
$interest = mysqli_real_escape_string($db, $interest);
$empid    = $_SESSION['empid'];
$empid    = mysqli_real_escape_string($db, $empid);

$result1 = mysqli_query($db, "SELECT * FROM employee WHERE empid = '$empid'")
or die('SQL Error: ' . mysqli_error($db));
$row1 = mysqli_fetch_array($result1);
$ifsc = $row1['ifsc'];
$ifsc = mysqli_real_escape_string($db, $ifsc);

$sqli = "INSERT INTO customer VALUES ('$custid', '$name', '$address','$phone','$mail','$bdate','$psw')";

if ($stmti = mysqli_prepare($db, $sqli)) {
    if (substr($accn, 0, 4)==substr($ifsc, -4)) {
        mysqli_stmt_bind_param($stmti, "ississs", $custid, $name, $address, $phone, $mail, $bdate, $psw);
        if (mysqli_stmt_execute($stmti)) {
            $sql = "INSERT INTO account VALUES ($accno, $balance, '$interest',$custid,'$ifsc')";
            if ($stmt = mysqli_prepare($db, $sql)) {
                mysqli_stmt_bind_param($stmt, "iisis", $accno, $balance, $interest, $custid, $ifsc);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: tabs10.php");
                } else {
                    echo "ERROR: Could not execute query: $sql. " . mysqli_error($db);
                }
            } else {
                echo "ERROR: Could not prepare query: $sql. " . mysqli_error($db);
            }
        } else {
            echo "ERROR: Could not execute query: $sqli. " . mysqli_error($db);
        }
    } else {
        echo "starting 4 digits of account number do not match last 4 digits of ifsc";
    }
} else {
    echo "ERROR: Could not prepare query: $sqli. " . mysqli_error($db);
}


mysqli_stmt_close($stmti);
mysqli_stmt_close($stmt);
mysqli_close($db);
