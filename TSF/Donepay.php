<?php
    require_once('config/db.php');
        $from=$_POST['from'];
        $amount=$_POST['amount'];  
        session_start();
        $to=$_SESSION['id'];
        if($from === '')
        {
            die("! Select the Name to Hum you want to send");
        }   
        if($amount === '')
        {
            die("! Enter the Amount");
        }
    $query="select * from customer where Account_no = $to";
    $query1="select * from customer where Account_no = $from";
    $result=mysqli_query($con,$query);
    $result1=mysqli_query($con,$query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Donepay.css">
    <title>Document</title>
</head>
<body>
    <div class="nav-bar">
        <div class="logo">
            <img src="/img/png-transparent-bank-logo-bank-saving-bank-pic-building-structure-bank-thumbnail-removebg-preview.png" />
        </div>
        <div class="login">
            <button>Login</button>
        </div>
    </div>
    <div class="image">
        <img src="https://funtura.in/lko/wp-content/themes/funtura/assets/images/success.svg">
    </div>
    <p>Payment Done</p><br> <br> 
    <div class="contaner">
    <table>
    <tr>
        <th>Account No</th>
        <th>Name</th>
    </tr>
    <?php
        while($row=mysqli_fetch_array($result))
        {
    ?>
    <td><?php echo $row['Account_no'];?></td>
    <td><?php echo $row['Name']; ?></td>
    
    <?php
        }
    ?>
    <tr>
    <br>
    <?php
        while($row=mysqli_fetch_array($result1))
        {
    ?>
    <td><?php echo $row['Account_no'];?></td>
    <td><?php echo $row['Name']; ?></td>
    
    <?php
        }
    ?>
    </tr>
    </table>
    </div>
    <?php

        if(isset($_POST['yes'])){
            $sql="INSERT into transfer values('','$to','$from','$amount');";
            $inter=mysqli_query($con,$sql);
        }
    ?>
    <?php
        $upd="UPDATE customer SET Current_Balance = Current_Balance+ $amount WHERE Account_no = $to";
        $sqlup=mysqli_query($con,$upd);
        $del="UPDATE customer SET Current_Balance = Current_Balance- $amount WHERE Account_no = $from";
        $sqlupd=mysqli_query($con,$del);
    ?>
    <div class="bb">
    <button><a href="index.php">Done</a></button>
    </div>
</body>
</html>
<style>
*{
    margin: 0;
    padding: 0;
}
body{
    background-color: #F3F2F7;
}
.nav-bar{
    position: fixed;
    top: 0px;
    background-image: url("https://img.freepik.com/free-vector/white-blurred-background_1034-249.jpg");
    width: 100%;
    height: 80px;
    display: flex;
    justify-content:space-between;
    z-index: 1;
}
.image{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 500px;
}
.logo img{
    height: 100%;
    margin: 0px 20px;
}
.image img{
    margin-top: 80px;
    height: 250px;
}
.login button{
  color: #fff;
  padding: 10px 20px;
  margin: 15px 25px;
  background-color: #38D2D2;
  background-image: radial-gradient(93% 87% at 87% 89%, rgba(0, 0, 0, 0.23) 0%, transparent 86.18%), radial-gradient(66% 66% at 26% 20%, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0) 69.79%, rgba(255, 255, 255, 0) 100%);
  box-shadow: inset -3px -3px 9px rgba(255, 255, 255, 0.25), inset 0px 3px 9px rgba(255, 255, 255, 0.3), inset 0px 1px 1px rgba(255, 255, 255, 0.6), inset 0px -8px 36px rgba(0, 0, 0, 0.3), inset 0px 1px 5px rgba(255, 255, 255, 0.6), 2px 19px 31px rgba(0, 0, 0, 0.2);
  border-radius: 14px;
  font-weight: bold;
  font-size: 16px;
  border: 0;
  cursor: pointer;
}
p{
    width: 100%;
    display: flex;
    justify-content: center;
    font-size: 2rem;
}
.contaner{
    width: 100%;
    display: flex;
    justify-content: center;
}
table{
    text-align: center;
    width: 80%;
}
table, th, td {
        border-collapse: collapse;
        padding: 5px 15px;
    }
    th {
        color: black;
    }
    .bb{
        width: 100%;
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .bb a{
        text-decoration: none;
        color: white;
    }
button {
  background-image: linear-gradient(135deg, #f34079 40%, #fc894d);
  border: 0;
  width: 60%;
  border-radius: 10px;
  box-sizing: border-box;
  font-family: "Codec cold",sans-serif;
  font-size: 16px;
  font-weight: 700;
  height: 54px;
  justify-content: center;
  letter-spacing: .4px;
  padding-left: 20px;
  padding-right: 20px;
  padding-top: 3px;
  text-transform: uppercase;
}

</style>