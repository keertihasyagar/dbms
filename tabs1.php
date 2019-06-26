<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: "Raleway", sans-serif;}

/* Full-width input fields */
input[type=password], input[type=number], input[type=text], input[type=email], input[type=date]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
/*remove arrows for number*/
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    margin: 0;
}

/* Set a style for all buttons */
button {
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    font-size: 15px;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: rgba(0,0,0, 0.9);
    color: white;
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

.container {
    margin: auto;
    align: center;
    padding: 16px;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 10% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 60%; /* Could be more or less, depending on screen size */

}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn {
       width: 100%;
    }
}
/* The Overlay (background) */
.overlay {
    /* Height & width depends on how you want to reveal the overlay (see JS below) */
    height: 100%;
    width: 0;
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    background-color: rgb(0,0,0); /* Black fallback color */
    background-color: rgba(0,0,0, 0.9); /* Black w/opacity */
    overflow-x: hidden; /* Disable horizontal scroll */
    transition: 0.5s; /* 0.5 second transition effect to slide in or slide down the overlay (height or width, depending on reveal) */
}

/* Position the content inside the overlay */
.overlay-content {
    position: relative;
    top: 25%; /* 25% from the top */
    width: 100%; /* 100% width */
    text-align: center; /* Centered text/links */
    margin-top: 30px; /* 30px top margin to avoid conflict with the close button on smaller screens */
}

/* The navigation links inside the overlay */
.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block; /* Display block instead of inline */
    transition: 0.3s; /* Transition effects on hover (color) */
}

/* When you mouse over the navigation links, change their color */
.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

/* Position the close button (top right corner) */
.overlay .closebtn {
    position: absolute;
    top: 20px;
    right: 45px;
    font-size: 60px;
}

/* When the height of the screen is less than 450 pixels, change the font-size of the links and position the close button again, so they don't overlap */
@media screen and (max-height: 450px) {
    .overlay a {font-size: 20px}
    .overlay .closebtn {
        font-size: 40px;
        top: 15px;
        right: 35px;
    }
}
.sidenav {
    height: 100%;
    width: 100%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 50px;
}

.sidenav a {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    text-align: center;
}

.sidenav a:hover {
    color: #f1f1f1;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}

</style>
</head>
<body>
<div class="sidenav">

  <a onclick="document.getElementById('id01').style.display='block'" >Account Info</a> <br><br>
  <a onclick="document.getElementById('id05').style.display='block'" >View Profile</a>  <br><br>
  <a onclick="document.getElementById('id02').style.display='block'" >Update Info</a>  <br><br>
  <a onclick="openNav()">Transaction Report</a>  <br><br>
  <a onclick="document.getElementById('id04').style.display='block'" >Funds Transfer</a>  <br><br>
  <a onclick="window.location.href = 'index.php';">Logout</a>
</div>

<div id="id01" class="modal">
  <?php
    error_reporting(E_ALL ^ E_WARNING ^E_NOTICE);
    include 'dbcon.php';
    $custid = $_SESSION['custid'];
    $accno = $_SESSION['accno'];
    //prevent mysql injection
    $custid= stripcslashes($custid);
    $accno= stripcslashes($accno);

    $custid = mysqli_real_escape_string($db, $custid);
    $accno = mysqli_real_escape_string($db, $accno);
    $query = "CALL `project`.`acc_info`($accno, @balance, @interest, @custid, @ifsc);" ;
    $result = mysqli_query($db, $query) or die('SQL Error: ' . mysqli_error($db));
    $row = mysqli_fetch_array($result);
    mysqli_close($db);
  ?>

  <form class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
    </div>
    <div class="container">
      <h2 style="text-align: center; font-size: 20px; ">Details of your account</h2>
      <label><b>Customer id</b></label><br>
      <input type="number" value="<?php echo "$row[3]"; ?>"><br>

      <label><b>Account number</b></label><br>
      <input type="number" value= "<?php echo "$accno"; ?>"><br>

      <label><b>Balance</b></label><br>
      <input type="number" value= "<?php echo "$row[1]"; ?>"><br>

      <label><b>Interest</b></label><br>
      <input type="text"value= "<?php echo "$row[2]"; ?>"><br>

      <label><b>IFSC</b></label><br>
      <input type="text" value= "<?php echo "$row[4]";?>"><br>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
    </div>

  </form>
</div>

<div id="id05" class="modal">
  <?php
  error_reporting(E_ALL ^ E_WARNING ^E_NOTICE);
    include 'dbcon.php';
    $custid = $_SESSION['custid'];
    //prevent mysql injection
    $custid= stripcslashes($custid);

    $custid = mysqli_real_escape_string($db, $custid);
    $query = "SELECT * from customer where custid='$custid'" ;
    $result = mysqli_query($db, $query) or die('SQL Error: ' . mysqli_error($db));
    $row = mysqli_fetch_array($result);
  ?>
<form class="modal-content animate">
  <div class="imgcontainer">
    <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close">&times;</span>
  </div>
  <div class="container">
      <h6 style="text-align: center; font-size: 20px; ">Your Profile</h6>

          <label for="name"><b>Name</b></label><br>
          <input type="text" value="<?php echo "$row[1]"; ?>" name="name" ><br>

          <label for="address"><b>Address</b></label><br>
          <input type="text" value="<?php echo "$row[2]"; ?>" name="address" ><br>

          <label for="phone"><b>Phone number</b></label><br>
          <input type="number" value="<?php echo "$row[3]"; ?>" name="phone" ><br>

          <label for="mail"><b>Email id</b></label><br>
          <input type="email" value="<?php echo "$row[4]"; ?>" name="mail"><br>

          <label for="bdate"><b>Birth date</b></label><br>
          <input type="date" value="<?php echo "$row[5]"; ?>" name="bdate" required><br>

        </div>
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
        </div>
      </form>
    </div>
<div id="id02" class="modal">

  <form class="modal-content animate" method="POST" action="updatecust.php" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">&times;</span>
    </div>
    <div class="container">
        <h3 style="text-align: center; font-size: 20px; ">Update Your Details</h3>

          <label for="name"><b>Name</b></label><br>
          <input type="text" name="name" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="45" required><br>

          <label for="address"><b>Address</b></label><br>
          <input type="text" name="address" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" required><br>

          <label for="phone"><b>Phone number</b></label><br>
          <input type="number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

          <label for="mail"><b>Email id</b></label><br>
          <input type="email" name="mail" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="35" ><br>

          <label for="bdate"><b>Birth date</b></label><br>
          <input type="date" name="bdate" required><br>

          <button type="submit">Submit</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
    </div>

  </form>
</div>


<div id="id04" class="modal">
  <form class="modal-content animate" method="POST" action="trans.php" >
    <div class="imgcontainer">
      <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close">&times;</span>
    </div>
    <div class="container">
      <h5 style="text-align: center; font-size: 20px; ">Transfer</h5>
      <br>
      <label for="taccno"><b>Account number</b></label><br>
      <input type="number" placeholder="Enter account number" name="taccno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" required><br>

      <label for="amount"><b>Amount</b></label><br>
      <input type="number" placeholder="Enter amount" name="amount" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

      <button type="submit">Submit</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
    </div>

  </form>
</div>


    <!-- The overlay -->
<div id="myNav" class="overlay">

  <!-- Button to close the overlay navigation -->
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  <!-- Overlay content -->
  <div class="overlay-content">
    <a href="fullrep.php">Report</a>
    <a href="tday.php">Last 30 days</a>
    <a href="fday.php">Last 15 days</a>
  </div>

</div>

</body>
</html>
<script>
/* Open when someone clicks on the span element */
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

/* Close when someone clicks on the "x" symbol inside the overlay */
function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
</script>
