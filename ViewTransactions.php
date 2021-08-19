<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1280, initial-scale=1.0">
    <title>View Transactions</title>
    <link rel="icon" href="Soures/icon.png">
    <link rel="stylesheet" href="Styles/ViewTransactions_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light" id="nav_bar">
  <span id="head">
    <img src="Soures/Navbar.png" width="32" height="32" class="d-inline-block align-top" alt="">
    TSF Bank
  </span>
</nav>
    <?php
    include 'Connection.php';
    $sql="SELECT* FROM transaction";
    $result= mysqli_query($conn,$sql);
    
    ?>

    <div class="table">
      <h2>All Transactions</h2>
      <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <thead>
          <tr>
          <th>Transaction_id</th>
          <th>From Account No </th>
          <th>Sender</th>
          <th>To Account No</th>
          <th>Receiver</th>
          <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while($rows=mysqli_fetch_assoc($result)){
                  $send=$rows['from_account'];
                  $rece=$rows['to_account'];
                  $sql1="SELECT name from customers where account_no=$send";
                  $result1= mysqli_query($conn,$sql1);
                  $row1=mysqli_fetch_assoc($result1);
                  $sql2="SELECT name from customers where account_no=$rece";
                  $result2= mysqli_query($conn,$sql2);
                  $row2=mysqli_fetch_assoc($result2);
          ?>
            <tr>
                <td><?php echo $rows['transaction_id']?></td>
                <td><?php echo $rows['from_account']?></td>
                <td><?php echo $row1['name']?></td>
                <td><?php echo $rows['to_account']?></td>
                <td><?php echo $row2['name']?></td>
                <td><?php echo $rows['amount']?></td>

                
            </tr>
          <?php
              }
          ?>

        </tbody>
    </table>
    <a href="index.php" ><button id="butt1" class="btn btn-light btn-lg btn-block">Go To Home</button></a>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>