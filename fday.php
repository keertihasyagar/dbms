<?php session_start(); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  form {
    width: 80%;
    margin: 150px;
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
    background-color: #666666;
    border-color: #404040;
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
    background-color: #e6e6e6;
  }
  .data-table tbody tr:hover td {
    background-color: #ffcccc;
    border-color: #ff8080;
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
  /* Set a style for all buttons */
  button {
    background-color: #262626;
    color:white;
      padding: 14px 20px;
      margin-left: 45%;
      border: none;
      cursor: pointer;
      width: auto;
      font-size: 15px;
  }

  button:hover {
      opacity: 0.8;
  }

  </style>
</head>
<body>
<div class="container">
  <form>
  <div class="imgcontainer">
    <span onclick="window.location.href = 'tabs1.php'" class="close" title="Close">&times;</span>
  </div>
  <div class="container">
  <table class="data-table">
    <caption class="title" style="text-align: center; font-size: 20px; ">Debit Transactions of your account in last 15 days</caption>
    <thead>
      <tr>
        <th>Transaction_id</th>
        <th>Date</th>
        <th>Amount</th>
        <th>To_Accno</th>
      </tr>
    </thead>
    <tbody>
    <?php
    error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_STRICT);
    include("dbcon.php");
        $accno = $_SESSION['accno'];
        $accno = mysqli_real_escape_string($db, $accno);
        $date   = date("Y-m-d");
        if (mysqli_multi_query($db, "SELECT * from transaction where accno='$accno' and transdate >= DATE_ADD( '$date',INTERVAL -15 DAY)  order by transdate ")  or die('SQL Error: ' . mysqli_error($db))) {
            do {
                /* store first result set */
                if ($result1 = mysqli_store_result($db)) {
                    while ($row = mysqli_fetch_row($result1)) {
                        echo '<tr>
                  <td>'.$row[0].'</td>
                  <td>'.$row[1].'</td>
                  <td>'.$row[2].'</td>
                  <td>'.$row[5].'</td>
                </tr>';
                    }
                    mysqli_free_result($result1);
                }
            } while (mysqli_next_result($db));
        }
        mysqli_close($db);
    ?>
  </tbody>
  </table>
  <br>
  <table class="data-table">
    <caption class="title" style="text-align: center; font-size: 20px; ">Credit Transactions of your account in last 15 days</caption>
    <thead>
      <tr>
        <th>Transaction_id</th>
        <th>Date</th>
        <th>Amount</th>
        <th>From_Accno</th>
      </tr>
    </thead>
    <tbody>
    <?php
    error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_STRICT);
    include("dbcon.php");
        $accno = $_SESSION['accno'];
        $accno = mysqli_real_escape_string($db, $accno);
        $date   = date("Y-m-d");
        if (mysqli_multi_query($db, "SELECT * from transaction where to_acc='$accno' and transdate >= DATE_ADD( '$date',INTERVAL -15 DAY)  order by transdate ")  or die('SQL Error: ' . mysqli_error($db))) {
            do {
                /* store first result set */
                if ($result1 = mysqli_store_result($db)) {
                    while ($row = mysqli_fetch_row($result1)) {
                        echo '<tr>
                  <td>'.$row[0].'</td>
                  <td>'.$row[1].'</td>
                  <td>'.$row[2].'</td>
                  <td>'.$row[4].'</td>
                </tr>';
                    }
                    mysqli_free_result($result1);
                }
            } while (mysqli_next_result($db));
        }
        mysqli_close($db);
    ?>
  </tbody>
  </table>
</div>
<br>
  <button type="button" onclick="window.location.href= 'index.php'" class="cancelbtn">Logout</button>
</form>
</div>
</body>
