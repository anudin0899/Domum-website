<?php


    $conn=mysqli_connect('localhost','root');
      $db=mysqli_select_db($conn,'domum');

      if(!$conn)
      {
        die('connection fails'.mysqli_connect_error());
      }

?>