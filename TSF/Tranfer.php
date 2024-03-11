<?php
    require_once('config/db.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    $query="select * from customer where account_no = $id";
    $result= mysqli_query($con,$query);
?>
<?php
    session_start();
    $_SESSION['id']=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/Tranfer.css">
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
    <form action="Donepay.php" method="post">
        <div class="contaner">
            <table>
                <tr>
                    <th>Account No</th>
                    <th>Name</th>
                </tr>
                <?php
                    $row=mysqli_fetch_array($result)
                ?>
                    <tr class="ii">
                        <td><?php echo $row['Account_no']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                    </tr>
            </table>
        </div>
        <br><br><h3>From :</h3><br><br>
        <select name="from">
            <option> </option>
                <?php
                    $query="select * from customer";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_array($result))
                    {
                ?>
            <option value=<?php echo $row['Account_no']; ?>>
                <?php echo $row['Account_no']; ?>
                <?php echo $row['Name']; ?>
            </option>
                <?php
                    }
                ?>
        </select><br>
        <input type="number" placeholder="Enter Amount" name="amount"><br><br>
        <input type="submit" value="Conform" name="yes" href="Donepay.php?id=<?php echo $id; ?>" class="conformed">
    </form>
    <script>
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
    transform: translate(-0%,50%);
    background-color: #F3F2F7;
}
.nav-bar{
    position: fixed;
    top: -200px;
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
form{
    background-color: rgb(235, 232, 227);
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 30px;
    border-radius: 10px;
}

.contaner{
    width: 300px;
}
    table{
        width: 100%;
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

.ii{
    background-color:white;
    font-size: 1.2rem;
    text-align: center;
    padding: 2px 43px;
}

input{
    border: 0px;
    background-color: #fff;
  border-radius: 12px;
  box-shadow: transparent 0 0 0 3px,rgba(18, 18, 18, .1) 0 6px 20px;
  box-sizing: border-box;
  color: #121212;
  cursor: pointer;
  font-size: 1.2rem;
  line-height: 1;
  padding: 0.8rem 1rem;
}
.conformed {
  background-color: #fff;
  border-radius: 12px;
  box-shadow: transparent 0 0 0 3px,rgba(18, 18, 18, .1) 0 6px 20px;
  box-sizing: border-box;
  color: #121212;
  cursor: pointer;
  font-size: 1.2rem;
  line-height: 1;
  padding: 0.8rem 1rem;
}

.conformed:hover {
  box-shadow: 1px 0.1px 10px black, transparent 0 0 0 0;
}

select{
    border: 0px;
    background-color: #fff;
  border-radius: 12px;
  box-shadow: transparent 0 0 0 3px,rgba(18, 18, 18, .1) 0 6px 20px;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  font-size: 1rem;
  line-height: 1;
  padding: 0.8rem 1rem;
}

h3{
    font-family:Arial, Helvetica, sans-serif;
}
</style>