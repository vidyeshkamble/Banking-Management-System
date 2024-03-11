<?php
    require_once('config/db.php');
    $query="select * from transfer";
    
    $sql="SELECT * FROM `transfer` INNER JOIN `customer` ON transfer.to=customer.Account_no";
    $sql1="SELECT * FROM `transfer` INNER JOIN `customer` ON transfer.form=customer.Account_no";
    $result= mysqli_query($con,$sql);
    $result1= mysqli_query($con,$sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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
    <div class="contaner">
    <table>
        <tr>
            <th>Transfer Id</th>
            <th>To</th>
            <th>Form</th>
            <th>Amount</th>
        </tr>
        <?php
            while($row=mysqli_fetch_array($result) and $row1=mysqli_fetch_array($result1))
            {
            ?>
        <tr>
            <td><?php echo $row['Tid']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row1['Name']; ?></td>
            <td><?php echo $row['Amount']; ?></td>
        </tr>
        <?php
            }
        ?>  
    </table>
    </div>
    <div class="back">
        <button id="back">Go back</button>
    </div>
    <script>
        $(document).ready(function(){
            $('#back').click(function(){
                history.back();
            });
        });
    </script>
</body>
</html>
<style>
    *{
    padding: 0;
    margin: 0;
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

.logo img{
    height: 100%;
    margin: 0px 20px;
}
.image{
    overflow: hidden;
    height: 310px;
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

.contaner{
    margin-top: 130px;
    display: flex;
    justify-content: center;
    
}
table, th, td {
    border-collapse: collapse;
    padding: 5px 15px;
    background-color:white;
}
th {
    background-color:#494D5F;
    color: white;
    border-top: 1px solid black;
}
td{
    border-top: 1px solid whitesmoke;
}
.back{
    display: flex;
    justify-content: center;
    margin-top: 30px;
}
.back button{
  background-color: #FFFFFF;
  border: 1px solid #222222;
  border-radius: 8px;
  box-sizing: border-box;
  color: #222222;
  cursor: pointer;
  display: inline-block;
  font-family: Circular,-apple-system,BlinkMacSystemFont,Roboto,"Helvetica Neue",sans-serif;
  font-size: 16px;
  font-weight: 600;
  line-height: 20px;
  margin: 0;
  outline: none;
  padding: 13px 23px;
  position: relative;
  text-align: center;
  text-decoration: none;
  touch-action: manipulation;
  transition: box-shadow .2s,-ms-transform .1s,-webkit-transform .1s,transform .1s;
  width: 250px;
}

.back:focus-visible {
  box-shadow: #222222 0 0 0 2px, rgba(255, 255, 255, 0.8) 0 0 0 4px;
  transition: box-shadow .2s;
}

.back:active {
  background-color: #F7F7F7;
  border-color: #000000;
  transform: scale(.96);
}

.back:disabled {
  border-color: #DDDDDD;
  color: #DDDDDD;
  cursor: not-allowed;
  opacity: 1;
}
</style>