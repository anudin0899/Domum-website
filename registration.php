<?php



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

        $conn = mysqli_connect('localhost','root');
        $db = mysqli_select_db($conn,'domum');

        if(!$conn)
        {
             die('connection fails'.mysqli_connect_error());
        }

    $name =$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
   
        $SQLInsert = "INSERT INTO user (username, email, password) VALUES ('$name', '$email', '$password')";
        $regi_run= mysqli_query($conn,$SQLInsert);
        
        if($regi_run ) {

           header('location: login.php');

        }
        
        

    
}
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domum</title>
    <link rel="stylesheet" href="A.css">
    <link rel="stylesheet" href="Login.html">
</head>
<body>
    
    <div class="container">
        <div class="header">
            <div class="logo">
                <a class="logo-text" href="">DOMUM</a>

            </div>
        </div>
        <div class="login">    
            <div class="login-controls">
                
                <form action="" method="POST">
                       <H1>SIGN UP</H1>
                        <div>
                            <input type="text" name="name" placeholder="FULLNAME" class="sp" >
                        </div>
                         <div>
                            <input type="email" name="email" placeholder="EMAIL" class="sp" >
                        </div>
                        
                        <div>
                            <input type="password" placeholder="PASSWORD" name="password" class="sp" >
                        </div>
                        
                        <div>
                            
                            <input type="password" placeholder="CONFIRM PASSWORD" name="confirm_password" class="sp">
                        </div>
                                           
                            <input class="s-btn" type="submit" name="submit" value="submit">   
                            <p>ALREADY  HAVE A ACCOUNT?<a href="login.php">LOGIN HERE</a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>