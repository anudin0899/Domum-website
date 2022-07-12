<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<?php

$mysqli=new mysqli('localhost','root','','domum');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_GET['posts'])){

	$id=$_GET['posts'];
	$query2= "SELECT * FROM property where pid='$id'";
	$readd=$mysqli->query($query2);

}

?>

<style type="text/css">
	
.rooms img{
	width: 150px;
	height: 150px;
}

</style>
<div class="container">
	<table class="table table-striped table-hover ">
  <head>
    <tr>
      <th>Address</th>
    
      <th>Floor Space</th>
  
      <th>Description</th>
      <th>Rooms</th>
    </tr>
  </head>
  <body>
  <?php while ($row = $readd->fetch_assoc()) { ?>

    <tr>
      <td> <?php echo $row['address'];  ?></td>
      
      <td><?php echo $row['floor'];  ?></td>
      
      <td><?php echo $row['descrip'];  ?></td>
      <td class="rooms">

      		<?php  $image_name="SELECT * FROM property as p join details as d 
      					on p.pid =d.proid where d.proid =".$row['pid'];
      					$read1=$mysqli->query($image_name);

      					foreach ($read1 as $value) { ?>

      						<img src="uploads/<?php echo $value['images']; ?>" />
      						
      					<?php  } ?>
      					</td>
    </tr>
<?php   } ?>
  </body>
</table> 

</div>




<?php include('includes/footer.php') ?>