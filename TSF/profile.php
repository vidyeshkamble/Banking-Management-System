<?php
    require_once('config/db.php');
    if(isset($_GET['profileid'])){
        $id=$_GET['profileid'];
    $query="select * from customer where account_no = $id ";
    $result= mysqli_query($con,$query);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/profile.css">
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
        
        <div class="head">
            <h3>Customer Information</h3>
        </div>
        <div class="tab">
            <table>
                <tr>
                    <th>Account No</th>
                    <th>Name</th>
                    <th>Phone No</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Current Balance</th>
                </tr>
                <?php
                    $row=mysqli_fetch_array($result)
                ?>
                    <tr>
                        <td><?php echo $row['Account_no']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Phone_no']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Current_Balance']; ?></td>
                    </tr>
        
            </table>
        </div>
        <br><br> <br> 
        <button><a href="Tranfer.php?id=<?php echo $id; ?>" style="text-decoration: none; color: black;">Transfer Money</a></button><br>
        <button id="goback">Go Back</button>
    </div>
<script>
    $(document).ready(function(){
        $('#goback').click(function(){
            history.back();
        });
    });
</script>
</body>
</html>
<style>
    *{
    margin: 0;
    padding: 0;
}

body{
    display: flex;
    justify-content: center;
    flex-direction: column; 
    background-color: #F3F2F7;   
}

.nav-bar{
    display: flex;
    background-image: url("https://img.freepik.com/free-vector/white-blurred-background_1034-249.jpg");
    top: 0px;
    justify-content: space-between;
}

.logo img{
    height: 100px;
    margin: 0px 20px;
}
.login button{
  color: #fff;
  padding: 10px 20px;
  margin: 30px 25px;
  background-color: #38D2D2;
  background-image: radial-gradient(93% 87% at 87% 89%, rgba(0, 0, 0, 0.23) 0%, transparent 86.18%), radial-gradient(66% 66% at 26% 20%, rgba(255, 255, 255, 0.55) 0%, rgba(255, 255, 255, 0) 69.79%, rgba(255, 255, 255, 0) 100%);
  box-shadow: inset -3px -3px 9px rgba(255, 255, 255, 0.25), inset 0px 3px 9px rgba(255, 255, 255, 0.3), inset 0px 1px 1px rgba(255, 255, 255, 0.6), inset 0px -8px 36px rgba(0, 0, 0, 0.3), inset 0px 1px 5px rgba(255, 255, 255, 0.6), 2px 19px 31px rgba(0, 0, 0, 0.2);
  border-radius: 14px;
  font-weight: bold;
  font-size: 16px;
  border: 0;
  cursor: pointer;
}

.contaner {
    margin-left: 50%;
    margin-right: 50%;
    transform: translate(-50%);
    width: 70%;
    overflow:hidden;
    margin-top: 20%;
    display: flex;
    flex-direction: column;
    background: #FFFFFF;
    padding: 3% 6%;
    border-radius: 20px;
}

h3{
    display: flex;
    justify-content: center;
    margin: 15px;
    font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif ;
}
.tab{
    overflow: scroll;
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
        background-color: #F3F2F7;
    }   

.contaner button {
    margin-left: 50%;
    margin-right: 50%;
    transform: translate(-50%,-50%);
  background: #FFFFFF;
  border: 0 solid #E2E8F0;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  font-family: Inter, sans-serif;
  font-size: 0.8rem;
  font-weight: 700;
  height: 40px;
  justify-content: center;
  overflow-wrap: break-word;
  text-decoration: none;
  width: 150px;
  border-radius: 8px;
  cursor: pointer;
}
</style>