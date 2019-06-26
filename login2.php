<?php
session_start();
include 'dbcon.php';
$_SESSION['custid'] = $_POST['usname'];
$_SESSION['accno']  = $_POST['accno'];

$custid   = $_SESSION['custid'];
$password = $_POST['psw'];
$accno    = $_SESSION['accno'];
//prevent mysql injection
$custid   = stripcslashes($custid);
$password = stripcslashes($password);
$accno    = stripcslashes($accno);

$custid   = mysqli_real_escape_string($db, $custid);
$password = mysqli_real_escape_string($db, $password);
$accno    = mysqli_real_escape_string($db, $accno);

$result = mysqli_query($db, "SELECT * FROM customer WHERE custid = '$custid' and password = '$password'")
or die('SQL Error: ' . mysqli_error($db));
if (mysqli_multi_query($db, "SELECT accno FROM account WHERE custid = '$custid' and accno='$accno'") or die('SQL Error: ' . mysqli_error($db))) {
    do {
        $i = 0;
        /* store first result set */
        if ($result1 = mysqli_store_result($db)) {
            while ($row1 = mysqli_fetch_row($result1)) {
                $acc[$i++] = $row1[0];
            }
            mysqli_free_result($result1);
        }
    } while (mysqli_next_result($db));
}

$row   = mysqli_fetch_array($result);
$found = 'false';
for ($n = 0; $n < $i; $n++) {
    if ($accno == $acc[$n]) {
        $found = 'true';
        break;
    }
}

if (($row['custid'] == $custid) && ($row['password'] == $password) && ($found == 'true')) {
    header("location: tabs1.php");
} else {
    echo "Your Username or Account number or Password is invalid";
}
mysqli_close($db);
?>