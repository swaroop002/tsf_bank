<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1280, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="icon" href="Soures/icon.png">
    <link rel="stylesheet" href="Styles/ViewCustomers_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light" id="nav_bar">
  <span id="head">
    <img src="Soures/Navbar.png" width="32" height="32" class="d-inline-block align-top" alt="">
    TSF Bank
  </a>
</nav>
    <?php
    include 'Connection.php';
    $sql="SELECT* FROM customers";
    $result= mysqli_query($conn,$sql);
    
    ?>

    <div class="table">
      <h2>All Customers</h2>
      <table class="table table-hover table-sm table-striped table-condensed table-bordered">
        <thead>
          <tr>
          <th>Name</th>
          <th>Account No.</th>
          <th>Details</th>
          </tr>
        </thead>
        <tbody>
          <?php
              while($rows=mysqli_fetch_assoc($result)){
          ?>
            <tr>
                <td><?php echo $rows['name']?></td>
                <td><?php echo $rows['account_no']?></td>
                <td><a href="Transfer.php?accno= <?php echo $rows['account_no'] ;?>"> <button type="button" class="butt">View</button></a></td>
            </tr>
          <?php
              }
          ?>

        </tbody>
    </table>
    </div>
    <a href="index.php" ><button id="butt1" class="btn btn-light btn-lg btn-block">Go To Home</button></a>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>