<?php
        include 'Connection.php';
        if(isset($_POST['submit'])){
            $sender = $_GET['accno'];
            $receiver=$_POST['rec'];
            $amt=$_POST['amt'];
            $sql1="SELECT balance FROM customers WHERE account_no=$sender";
            $result= mysqli_query($conn,$sql1);
            $row1=mysqli_fetch_array($result);
            $sql2="SELECT balance FROM customers WHERE account_no=$receiver";
            $result= mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_array($result);
            if($amt > $row1['balance']){
                echo '<div class="message"style="display:block;"><h1>Insufficient Funds to perform the transaction :(</h1></div>';
            }
            else{
                $senderbal=$row1['balance']-$amt;
                
                $receiverbal=$row2['balance']+$amt;
            
                $sql3="UPDATE customers set balance=$senderbal WHERE account_no=$sender;";
                mysqli_query($conn,$sql3);
                $sql4="UPDATE customers set balance=$receiverbal WHERE account_no=$receiver;";
                mysqli_query($conn,$sql4);
                
                $result = mysqli_query($conn,"SELECT COUNT(*) FROM transaction");
                $row=mysqli_fetch_assoc($result);
                $count = $row['COUNT(*)'];
                $count=$count+1;
                $sql5 = "INSERT INTO transaction(`transaction_id`, `from_account`, `to_account`,`amount`) VALUES ($count,$sender,$receiver,$amt)";
                $query=mysqli_query($conn,$sql5);
                if($query){
                        header("location:success.php");
                    }
            }
        }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1280, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="icon" href="Soures/icon.png">
    <link rel="stylesheet" href="Styles/Transfer_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light" id="nav_bar">
        <span id="head">
        <img src="Soures/Navbar.png" width="32" height="32" class="d-inline-block align-top" alt="">
        TSF Bank
        </span>
    </nav>
    <div class="container">
    <form class="form"  method="POST">
    <?php
        $acno=$_REQUEST['accno'];
        $sql="SELECT * FROM customers WHERE account_no=$acno";
        $result= mysqli_query($conn,$sql);
    ?>  
        <h2>Account Details</h2>  
        <div class="table">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Account No.</th>
                </tr>
            <?php
            $rows=mysqli_fetch_assoc($result);
            ?>
            <tr>
                    <td><?php echo $rows['name']?></td>
                    <td><?php echo $rows['email']?></td>
                    <td><?php echo $rows['balance']?></td>
                    <td><?php echo $rows['account_no']?></td>
                </tr>
            </table>
        </div>  
        Transfer to :
        <select name="rec" required>
            <option value="" disabled selected>--------------------</option>
            <?php
                $sql = "SELECT * FROM customers where account_no!=$acno";
                $result=mysqli_query($conn,$sql);
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option value="<?php echo $rows['account_no'];?>" >

                    Account Holder : <?php echo $rows['name'] ;?> ::  Account Balance : 
                    <?php echo $rows['balance'] ;?>

                </option>
                <?php
                }
            ?>
            
        </select>
        <br>
        Enter Amount to Transfer
        <input type="number" name="amt" min=0 required>
        <br>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button name="submit" type="submit">Transfer</button><br>
    </form>
    <a href="ViewCustomers.php"><button>Back</button></a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

</body>
</html>