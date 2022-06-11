<?php
session_start();
include 'connection/conn.php';
if(isset($_POST['submit'])){
    $user = $_POST['user'];
    $pass = $_POST['password'];
    $sql = "SELECT * FROM login WHERE username='$user' and password='$pass'";
    $result = mysqli_query($con,$sql);   
    if(mysqli_num_rows($result)){   
    }
    while($row = mysqli_fetch_array($result)){
        if($row['id'] == "3"){
    header('location:admin/welcome.php');
    mysqli_query($con, "UPDATE login set status='Online' WHERE id='".$row['id']."'");
   $_SESSION['uid'] = '3';
        }
     else{
        if($row['status']=="Offline"){
            header('Location: offline.php');
          }
          if($row['status']=="Online"){
   $_SESSION['uid'] = '3';

           header('Location: homepage/welcome.php');
          }
     }
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q32n3AfVM36ugBczzdtwkxC6Rai1so3ajf9OnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <section class="login">
    <div class="login_box">
      <div class="left">
       
        <div class="contact">
          <form action="" method="POST">
            <h3>SIGN IN</h3>
            <input type="text" placeholder="USERNAME" name="user">
            <input type="text" placeholder="PASSWORD" name="password">
            <button class="submit" name="submit">LOGIN</button>
          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text">
          <h2>CMS</h2>
          <h5>CREATIVE MARKETING SOLUTION</h5>
        </div>
        <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE32n3AfVM36ugBczzdtwkxC6Rai1so3ajf9v08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH732n3AfVM36ugBczzdtwkxC6Rai1so3ajf9-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO32n3AfVM36ugBczzdtwkxC6Rai1so3ajf9_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn32n3AfVM36ugBczzdtwkxC6Rai1so3ajf9JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc32n3AfVM36ugBczzdtwkxC6Rai1so3ajf9VCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
      </div>
    </div>
  </section>
</body>
</html>