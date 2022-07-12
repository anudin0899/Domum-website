<?php include('includes/header.php') ?>
<?php include('includes/adminnav.php') ?>
<header>
      <nav class="nav" class="navbar navbar-light bg-light">
        <span id="i_text" class="navbar-brand mb-0 h1">FEEDBACK</span>
      </nav>
      </header>

<body><br>


<table align="center" width="1300px" border="1">
    <tr>

      <td>Sno</td>
      <td>Name</td>
      <td>Email</td>
	    <td>Feedback</td>
     
    </tr>
	<?php
   

   require "dbconfig.php";
     $i=1;
     $sql = "SELECT * FROM contact";
     $rs = mysqli_query($conn,$sql);
     if(mysqli_num_rows($rs)>0)
     {
     
  
	    while($s=mysqli_fetch_array($rs))
      {
  ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $s['name']?></td>
      <td><?php echo $s['email']?></td>
	    <td><?php echo $s['message']?></td>
      
    </tr>
  
  <?php $i++; }} ?>
</table>
</body>
</html>
<?php include('includes/footer.php') ?>
