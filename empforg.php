<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
        font-family: "Raleway", sans-serif;
        text-align: center;
        background-color: lightcyan;
    }

    /*remove arrows for number*/
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0;
    }

    form {
       display: inline-block;
       position: center;
    }

    /* Set a style for all buttons */
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        text-align: center;
        width: 200px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
    }

    /* Add a hover effect for buttons */
    button:hover {
        opacity: 0.8;
    }

    /* Extra style for the cancel button (red) */
    .cancelbtn {
        background-color: red;
        color: white;
        padding: 14px 20px;
        text-align: center;
        width: 200px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
    }
    /* Full-width input fields */
    input[type=number], input[type=date], input[type=password] {
        width: 400px;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .h1{
        text-align: center;
        font-size: 50px;
    }
    </style>
</head>

<body>
    <h1>Forgot Password</h1>
    <form method="POST" action="empfor.php">
        <div class="container">

            <label for="uname"><b>Username </b></label><br>
            <input type="number" placeholder="Enter Username" name="uname" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" required><br>

            <label for="bdate"><b>Birth date</b></label><br>
            <input type="date" placeholder="Enter birth date" name="bdate" required><br>

            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter password" name="psw" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20" required><br>

            <label for="psw1"><b>Confirm Password</b></label><br>
            <input type="password" placeholder="Re-enter password" name="psw1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="20" required><br>

            <button type="submit">Submit</button>
            <button type="button" class="cancelbtn" onclick="window.location.href = 'index.php';">Cancel</button>
        </div>
    </form>
</body>

</html>
