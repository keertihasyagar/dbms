    <?php session_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
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
        color: white;
        background-color: rgba(0,0,0, 0.9);
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
        width: 50%; /* Could be more or less, depending on screen size */

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
      table {
        margin: auto;
        font-size: 12px;
      }
      table td {
        transition: all .5s;
      }

      /* Table */
      .data-table {
        border-collapse: collapse;
        font-size: 14px;
        min-width: 537px;
      }

      .data-table th,
      .data-table td {
        border: 1px solid #e1edff;
        padding: 7px 17px;
      }
      .data-table caption {
        margin: 7px;
      }

      /* Table Header */
      .data-table thead th {
        background-color: #AFEEEE;
        border-color: #6ea1cc;
        text-transform: uppercase;
      }
      .data-table title {
        font-size: 20px;
      }
      /* Table Body */
      .data-table tbody td {
        color: #353535;
      }
      .data-table tbody td:first-child,
      .data-table tbody td:nth-child(4),
      .data-table tbody td:last-child {
        text-align: right;
      }

      .data-table tbody tr:nth-child(odd) td {
        background-color: #f4fbff;
      }
      .data-table tbody tr:hover td {
        background-color: #ffffa2;
        border-color: #ffff0f;
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
        <br><br>
        <a onclick="document.getElementById('id04').style.display='block'" >View Profile</a> <br>
        <a onclick="document.getElementById('id05').style.display='block'" >Edit profile</a>  <br>
        <a onclick="document.getElementById('id01').style.display='block'" >Add new Customer</a> <br>
        <a onclick="document.getElementById('id02').style.display='block'" >Delete Customer</a>  <br>
        <a onclick="document.getElementById('id03').style.display='block'" >Add new Account</a>  <br>
        <a onclick="openNav()">Transaction Report</a> <br>
        <a onclick="window.location.href = 'index.php';" >Logout</a>
      </div>
      <div id="id04" class="modal">
        <?php
        error_reporting(E_ALL ^ E_WARNING ^E_NOTICE);
          include 'dbcon.php';
          $empid = $_SESSION['empid'];
          $empid = mysqli_real_escape_string($db, $empid);
          $query = "SELECT * from employee where empid='$empid'" ;
          $result = mysqli_query($db, $query) or die('SQL Error: ' . mysqli_error($db));
          $row = mysqli_fetch_array($result);
        ?>
      <form class="modal-content animate">
        <div class="imgcontainer">
          <span onclick="document.getElementById('id04').style.display='none'" class="close" title="Close">&times;</span>
        </div>
        <div class="container">
            <h6 style="text-align: center; font-size: 20px; ">Your Profile</h6>

            <label for="id"><b>Employee id</b></label><br>
            <input type="number" value="<?php echo "$row[0]"; ?>" name="id" ><br>

                <label for="name"><b>Name</b></label><br>
                <input type="text" value="<?php echo "$row[1]"; ?>" name="name" ><br>

                <label for="address"><b>Address</b></label><br>
                <input type="text" value="<?php echo "$row[2]"; ?>" name="address" ><br>

                <label for="phone"><b>Phone number</b></label><br>
                <input type="number" value="<?php echo "$row[3]"; ?>" name="phone" ><br>

                <label for="mail"><b>Email id</b></label><br>
                <input type="email" value="<?php echo "$row[4]"; ?>" name="mail"><br>

                <label for="bdate"><b>Birth date</b></label><br>
                <input type="date" value="<?php echo "$row[6]"; ?>" name="bdate" required><br>

                <label for="salary"><b>Salary</b></label><br>
                <input type="number" value="<?php echo "$row[7]"; ?>" name="salary" ><br>

                <label for="bank"><b>Branch</b></label><br>
                <input type="text" value="<?php echo "$row[8]"; ?>" name="bank" ><br>

              </div>
              <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
              </div>
            </form>
          </div>
          <div id="id05" class="modal" >
          <form class="modal-content animate" method="POST" action="updateemp.php">
            <div class="imgcontainer">
              <span onclick="document.getElementById('id05').style.display='none'" class="close" title="Close">&times;</span>
            </div>
            <div class="container">
                <h1 style="text-align: center; font-size: 20px; ">Edit Profile</h1>

                    <label for="name"><b>Name</b></label><br>
                    <input type="text" placeholder="Enter Name"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="45" required name="name" ><br>

                    <label for="address"><b>Address</b></label><br>
                    <input type="text" placeholder="Enter Address" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" required name="address" ><br>

                    <label for="phone"><b>Phone number</b></label><br>
                    <input type="number" placeholder="Enter phone number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required name="phone" ><br>

                    <label for="mail"><b>Email id</b></label><br>
                    <input type="email" placeholder="Enter email id" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="35" required name="mail"><br>

                    <label for="bdate"><b>Birth date</b></label><br>
                    <input type="date"  placeholder="Enter date of birth" name="bdate" required><br>

                    <button type="submit">Submit</button>
                  </div>
                  <div class="container" style="background-color:#f1f1f1">
                    <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
                  </div>
                </form>
              </div>
      <div id="id01" class="modal">
        <form class="modal-content animate" method="POST" action="insertcust.php">
          <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">&times;</span>
          </div>
          <div class="container">
            <h2 style="text-align: center; font-size: 20px; ">Add new Customer</h2>
            <label for="custid"><b>Customer id </b></label><br>
            <input type="number" placeholder="Enter Customer id" name="custid" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" required><br>

            <label for="name"><b>Name</b></label><br>
            <input type="text" placeholder="Enter full name" name="name" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="45" required><br>

            <label for="address"><b>Address</b></label><br>
            <input type="text" placeholder="Enter address" name="address" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="100" required><br>

            <label for="phone"><b>Phone number</b></label><br>
            <input type="number" placeholder="Enter phone number" name="phone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

            <label for="mail"><b>Email id</b></label><br>
            <input type="email" placeholder="Enter email address" name="mail" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="35" ><br>

            <label for="bdate"><b>Birth date</b></label><br>
            <input type="date" placeholder="Enter birth date" name="bdate" required><br>

            <label for="accno"><b>Account number</b></label><br>
            <input type="number" placeholder="Enter account number" name="accno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" required><br>

            <label for="balance"><b>Balance</b></label><br>
            <input type="number" placeholder="Enter balance" name="balance" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

            <button type="submit">Submit</button>
            <br> <br>
            
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
          </div>
        </form>

      </div>

      <div id="id02" class="modal">

        <form class="modal-content animate" method="POST" action="delcus.php" >
          <div class="imgcontainer">
            <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close">&times;</span>
          </div>
          <div class="container">
            <h3 style="text-align: center; font-size: 20px; ">Delete Customer</h3>
            <label for="custid"><b>Customer id</b></label><br>
            <input type="number" placeholder="Enter customer id" name="custid" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" required><br>

            <button type="submit">Submit</button>
          </div>

          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
          </div>

        </form>
      </div>
      <div id="id03" class="modal fade">
        <form class="modal-content animate" method="POST" action="insertaccf.php" >
          <div class="imgcontainer">
            <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close">&times;</span>
          </div>
          <div class="container">
            <h4 style="text-align: center; font-size: 20px; ">Add new Account</h4>

            <label for="custid"><b>Customer id</b></label><br>
            <input type="number" placeholder="Enter customer id" name="custid" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" required><br>

            <label for="accno"><b>Account number</b></label><br>
            <input type="number" placeholder="Enter account number" name="accno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" required><br>

            <label for="balance"><b>Balance</b></label><br>
            <input type="number" placeholder="Enter balance" name="balance" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

            <button type="submit">Submit</button>
            <br>
            <br>
          </div>
          <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
          </div>

        </form>
      </div>

    <div id="myNav" class="overlay">

        <!-- Button to close the overlay navigation -->
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

        <!-- Overlay content -->
        <div class="overlay-content">
          <a href="empfullrep.php">Report</a>
          <a href="etday.php">Last 30 days</a>
          <a href="efday.php">Last 15 days</a>
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
