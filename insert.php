


<?php
$mysqli=new mysqli('localhost','root','','domum');
	if($mysqli->connect_error){

		printf("can not connect databse %s\n",$mysqli->connect_error);
		exit();
	}

if(isset($_POST['submit'])){

	$name=$_POST['name'];
  $monthly=$_POST['monthly'];
  $type=$_POST['types'];
	$address=$_POST['address'];
	
	$floor=$_POST['floor'];

	$descrip=mysqli_real_escape_string($mysqli ,$_POST['descrip']);
	
	$target_dir="uploads/";
	$target_file= $target_dir . basename($_FILES["images"]["name"]);
	$temp_file=$_FILES["images"]["name"];
	move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
	
	$query="INSERT INTO property (name,monthly,types,address,floor,descrip,images,utype) VALUES ('$name','$monthly','$type','$address','$floor','$descrip','$temp_file','pending_property')";
	$insert=$mysqli->query($query);
	$last_id = $mysqli->insert_id;
	$c=count($_FILES['img']['name']);
	if($insert){

		if($c < 10){

			for ($i=0; $i <$c; $i++) { 
				$img_name=$_FILES['img']['name'][$i];
				move_uploaded_file($_FILES['img']['tmp_name'][$i] , "uploads/" .$img_name);
				$query_multi="INSERT INTO details(images,proid) VALUES ('$img_name','$last_id')";
				$ins=$mysqli->query($query_multi);
			}
			// else{
			// 	echo "MAX LIMIT EXCEED";
			// }

		}

	}


}


?>




<?php include('includes/header.php') ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-ligh">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#">PROPERTY <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link active" href="property.php">HOME</a>
      <a class="nav-item nav-link" href="#"></a>
      <a class="nav-item nav-link disabled" href="#"></a>
    </div>
  </div>
</nav>

<div class="container"> 

<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
  <fieldset>
    <legend>ADD PROPERTY </legend><br>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Name Of Property</label>
      <div class="col-lg-10">
        <input type="text" name="name" class="form-control" class="sp"  placeholder="Name Of Property">
      </div>
    </div>
    <div class="form-group col-lg-12">
      
        <table>
          <tr>
            <td> <label for="inputEmail" class="col-lg-12 control-label">Amount</label> </td>
            <td> <label for="inputEmail" class="col-lg-12 control-label">Type</label> </td>
          </tr>
          <tr>
            <td>  <input type="text" name="monthly" class="form-control" class="sp"  placeholder="Charge"> </td>
            <td> <select  type="text" name="types" class="form-control" class="sp" > 
                     <option  > RENT </option> 
                     <option  > SALE </option> 
                 </select> </td>
          </tr>
        </table>
   
     
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Address</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="address" rows="3" id="textArea"></textarea>
      </div>
    </div>
   
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Floor Space</label>
      <div class="col-lg-10">
        <input type="text" name="floor" class="form-control"  placeholder="Floor Space">
      </div>
    </div>
   

    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" name="descrip" rows="3" id="textArea"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Featured Image</label>
      <div class="col-lg-10">
        <input type="file" name="images">
      </div>
    </div>
    <div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Rooms Images</label>
      <div class="col-lg-10">
        <input type="file" name="img[]" multiple>
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-danger">Cancel</button>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


<?php include('includes/footer.php') ?>

