<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('includes/welcome.php'); ?>
<div class="containers  ">
    <div class="row mt-4 ml-2">
        <?php
          require "dbconfig.php";

        
             $sql = "SELECT * FROM property WHERE utype='approved'";
             $result = mysqli_query($conn,$sql);
             $num = mysqli_num_rows($result) > 0;

             if($num)
             {
                 while($row = mysqli_fetch_array($result))
                 {
        ?>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body" >
                        <img src="uploads/<?php echo $row['images']; ?>" width="250px" height="200px" alt="property images">
                        <h5 class="card-title"><?php echo $row['name']; ?></h5>
                        <h5 class="card-title"><?php echo $row['monthly']; ?>  <?php echo $row['types']; ?></h5>
                        
                        <h5 class="card-title"><?php echo $row['address']; ?></h5>
                        <p class="card-text"> </p>
                        <a href="single.php?posts=<?php echo  $row['pid'];  ?>" class="btn btn-primary">DETAILS</a>
                    </div>
                </div>
            </div>
        <?php
            }

            }
            else
            {
                echo "the property not found";

            }

        ?>

<?php include('includes/footer.php'); ?>
   