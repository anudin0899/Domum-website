<?php include('includes/header.php') ?>
<?php include('includes/adminnav.php') ?>



<body><br>
<table align="center" width="1300px" border="1">
  <tr>
    <th scope="col">Sno</th>
    <th scope="col">Name</th>
    <th scope="col">Address</th>
    <th scope="col">Amount</th>
    <th scope="col">Type</th>
    <th scope="col">floor</th>
    <th scope="col">Status</th>
    <th scope="col"></th>
    <th scope="col"></th>
    
    
  </tr>
  <?php
    require "dbconfig.php";
	$i=1;
	$sql = "SELECT * FROM property";
    $result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0)
	{
	    while($s=mysqli_fetch_array($result))
    {
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $s['name'];?></td>
    <td><?php echo $s['address'];?></td>
    <td><?php echo $s['monthly'];?></td>
    <td><?php echo $s['types'];?></td>
    <td><?php echo $s['floor'];?></td>
    <td><?php echo $s['utype'];?></td>
    
    
    
    
    <td><a href="property_approve.php?sid=<?php echo $s['pid'];?>&flag=0">Approve</a></td>
    <td><a href="property_approve.php?sid=<?php echo $s['pid'];?>&flag=1">Reject</a></td>
    
  </tr>
 <?php 
 $i++;
  }
  }?>
</table>
</body>







<?php include('includes/footer.php') ?>