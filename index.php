<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
    <style>
body {font-family: "Raleway", sans-serif;}
/* Full-width input fields */
input[type=password], input[type=number] {
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
    width: 50%;
}

button:hover {
    opacity: 0.8;
    box-shadow: 0 8px 12px 0 rgba(0,0,0,0.24), 0 7px 30px 0 rgba(0,0,0,0.19);
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

img.avatar {
    width: 75px;
    border-radius: 50%;
    height: 75px;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
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
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
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
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
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
    margin: 50px;
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
      <a style="font-szie:30px;"> Welcome!!</a>
      <a onclick="document.getElementById('id01').style.display='block'" >Login as Employee</a>
      <a onclick="document.getElementById('id02').style.display='block'" >Login as Customer</a>
    </div>

    <div id="id01" class="modal">

        <form class="modal-content animate" method="POST" action="login1.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="emp.png" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="number" placeholder="Enter Employee id" name="uname" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"maxlength="20" required>

                <button type="submit">Login</button><button type="reset">Reset</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="empforg.php">Forgot password?</a></span>
            </div>
        </form>
    </div>

    <div id="id02" class="modal">

        <form class="modal-content animate" method="POST" action="login2.php">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="cust.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="container">
                <label for="usname"><b>Username</b></label>
                <input type="number" placeholder="Enter Customer id" name="usname" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" required>

                <label for="accno"><b>Account Number</b></label>
                <input type="number" placeholder="Enter Account Number" name="accno" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="13" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20" required>

                <button type="submit">Login</button><button type="reset">Reset</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                <span class="psw"><a href="custforg.php">Forgot password?</a></span>
            </div>
        </form>
    </div>

</body>

</html>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<script>
    // Get the modal
    var modal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
