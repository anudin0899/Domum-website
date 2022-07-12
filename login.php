<?php



session_start();
  
  if (isset($_POST['submit']))
  {
   
    $uname=$_POST['user'];
    $pswd=$_POST['password'];
    
   
    if (empty($uname)|| empty($pswd))
    {
        
        echo "<script >alert('Enter  username and password');</script>";
        header('location:login.php');  
    }
    else
    {
      $conn=mysqli_connect('localhost','root');
      $db=mysqli_select_db($conn,'domum');

      if(!$conn)
      {
        die('connection fails'.mysqli_connect_error());
      }
      $sql="SELECT  `username`, `password` FROM `user` WHERE username='$uname' AND password='$pswd'";
      $result= mysqli_query($conn,$sql);
      $num= mysqli_num_rows($result);
      if($num==1)
      {
        if($uname=='admin')
        {
          echo"data entered";
          $_SESSION['uname']=$uname;
          $_SESSION['pswd']=$pswd;
          header('location:admin.php');
        }
        else {
          echo"data entered";
          $_SESSION['uname']=$uname;
          $_SESSION['pswd']=$pswd;
          header('location:property.php');
        }
      }
      else{
        
        echo "<script >alert('Enter valid username and password');</script>";
        
       
          }
    }
  }
  
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domum</title>
    <link rel="stylesheet" type="text/css" href="A.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <a class="logo-text" href="#">DOMUM</a>

            </div>
        </div>
        <div class="login">    
            <div class="login-controls">
               
                <form action="" method="POST">
                        <img src="img/avatar.svg">
                        <div>
                            <input type="text" placeholder="USERNAME" name="user" class="space" >
                        </div>
                        <div>
                            
                            <input type="text" placeholder="PASSWORD" name="password" class="space">
                        </div>
                       
                            <a class="l" href="forgetton.html"> FORGOTTEN ACCOUNT?</a>                     
                            <input class="s-btn" type="submit" name="submit" value="Login" >
                            <h4>DON'T HAVE A ACCOUNT?</h4>
                            <a href="Registration.php"> REGISTER HERE </a>    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>