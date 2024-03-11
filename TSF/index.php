<?php
    require_once('config/db.php');
    $query="select * from customer";
    $result= mysqli_query($con,$query);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="contaner">
        <div class="paper">
        </div>
        <div class="nav-bar">
                <div class="logo">
                    <img src="/img/png-transparent-bank-logo-bank-saving-bank-pic-building-structure-bank-thumbnail-removebg-preview.png" />
                </div>
                <div class="login">
                    <button>Login</button>
                </div>
        </div>
        <div class="image">
            <img src="https://jupiter.money/blog/wp-content/uploads/2022/08/111.-Digital-banking-3.jpg">
        </div>
        <div class="main">
            <button id="view" class="main-button">View All Customer</button>
            <button id="Trans-hist" class="main-button">Transaction History</button>
            <div id="box" class="customer"> 
                <div class="close">
                    <p> </p>
                    <h3>Customer Information</h3>
                    <button id="unview" class="unview"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <br>
                    <table>
                        <tr>
                        <th>Account No</th>
                        <th>Name</th>
                        <th>View Profile</th>
                        </tr>
                        <?php
                            while($row=mysqli_fetch_array($result))
                            {
                            $i = $row['Account_no'];
                        ?>
                            <tr>
                            <td><?php echo $row['Account_no']; ?></td>
                            <td><?php echo $row['Name']; ?></td>
                            <td><button><a href="profile.php?profileid=<?php echo $i; ?>" class="getit">Click Here</a></button></td>
                        <?php
                            }
                        ?>
                            </tr>
                    </table>
            </div>
            <div class="images">
                <img src="/img/Screenshot 2024-03-09 204512.png">
                <img src="/img/Screenshot 2024-03-09 204616.png">
                <img src="/img/Screenshot 2024-03-09 204439.png">
                <img src="/img/Screenshot 2024-03-09 204546.png">
            </div>
        </div>
    </div>
           
    <script>
        $(document).ready(function(){
            $('#box').hide();
            $('#unview').click(function(){
                $('#box').hide();
            });
            $('#view').click(function(){
                $('#box').show();
                $('#window').hide();
            });
            $('#Trans-hist').click(function(){
                window.location.href = "transferhis.php"; 
            }); 
        });
    </script>
</body>
</html>
<style>
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
    /* nav bar css */
*{
    margin: 0;
    padding: 0;
}
body{
    background-color: #F3F2F7;
}

.nav-bar{
    /* backdrop-filter: blur(80px); */
    background-image: url("https://img.freepik.com/free-vector/white-blurred-background_1034-249.jpg");
    position: fixed;
    width: 100%;
    height: 100px;
    display: flex;
    top: 0px;
    justify-content: space-between;
    z-index: 1;
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


.image{
    overflow: hidden;
    height: 310px;
}
.image img{
    margin-top: 100px;
    height: 250px;
}

.main{
    padding-top: 10px;
    position: sticky;
    backdrop-filter:blur(30px);
}

.contaner{
    display:flex;
    flex-wrap: wrap;
    justify-content: center;
}

.main-button{
  align-items: center;
  background: #FFFFFF;
  border: 0 solid #E2E8F0;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
  box-sizing: border-box;
  color: #1A202C;
  display: inline-flex;
  font-family: Inter, sans-serif;
  font-size: 1rem;
  font-weight: 700;
  height: 56px;
  justify-content: center;
  line-height: 24px;
  overflow-wrap: break-word;
  padding: 24px;
  text-decoration: none;
  width: auto;
  border-radius: 8px;
  cursor: pointer;
  user-select: none;
}
.close{
    display: flex;
    justify-content: space-between;
}
.unview{
    padding: 2px 10px;
    background: #FFFFFF;
    border: 0px;
    margin-right: 5%;
}

.customer{
    margin: 40px;
    padding: 8% 0%;
    border: 0px;
    border-radius: 15px;
    background: #FFFFFF;
}

.customer table tr td button{
    background-color:#F3F2F7;
    border-radius: 20px;
    border: 0px;
}

.getit{
    padding: 5px;
    text-decoration: none;
    color: black;
}
.images{
    display: flex;
    width: 100%;
    justify-content: center;
    flex-direction: column;
    position: relative;
}
.images img{
    border-radius: 20px;
    padding: 10px;
    width: 350px;
}
@media screen and (max-width: 388px) {
    .main-button{
    align-items: center;
    background: #FFFFFF;
    border: 0 solid #E2E8F0;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    box-sizing: border-box;
    color: #1A202C;
    display: inline-flex;
    font-family: Inter, sans-serif;
    font-size: 1rem;
    font-weight: 700;
    height: 56px;
    justify-content: center;
    line-height: 24px;
    overflow-wrap: break-word;
    padding: 24px;
    text-decoration: none;
    width: 100%;
    border-radius: 8px;
    cursor: pointer;
    user-select: none;
    margin-top: 10px;
    }
}
@media screen and (min-width: 835px){
    .contaner{
        display: flex;
        justify-content: center;
        flex-direction: column;
    }
    .image{
        height: auto;
    }
    .image img{
        width: 100%;
        height: auto;
        background-color: #38D2D2;
        justify-content: center;
    }
}
</style>