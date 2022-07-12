<?php include('includes/header.php') ?>
<?php include('includes/navbar.php') ?>

<header>
  <nav class="nav" class="navbar navbar-light bg-light">
    <span id="i_text" class="navbar-brand mb-0 h1">CONTACT US</span>
  </nav>
</header>



<?php

 

    if(isset($_POST['submit'])){

        $conn = mysqli_connect('localhost','root');
        $db = mysqli_select_db($conn,'domum');

        if(!$conn)
        {
             die('connection fails'.mysqli_connect_error());
        }


        $name = $_POST['Name'];
        $email = $_POST['Sender'];
        $message = $_POST['Message'];

        
        $statement="INSERT INTO contact (name, email, message) VALUES ('$name','$email','$message')";
        $insert_run= mysqli_query($conn,$statement);
        if($insert_run)
        {
            echo "";
        }
        else{
          
          echo "<script >alert('No message');</script>";
          
         
            }

        
    }


?>







<section>
    <div class="contacts pt-lg-5 pt-md-4">
        <div class="container">
            <div class="top-map">
                <div class="row map-content-9">
                    <div class="col-lg-8">
                        <div class="contact">
                            <h5 class="mb-2">Get in touch</h5>
                            <p class="mb-4">Your email address will not be published. Required fields are marked *</p>
                            <form action="" method="post" >
                                <div>
                                    <div class="mb-2 ">
                                        <input type="text" name="Name"  placeholder="Your Name"
                                            required="" class="sp">
                                    </div>
                                    <div >
                                        <input type="email" name="Sender"  placeholder="Email"
                                            required="" class="sp">
                                    </div>
                                </div>
                                <div class=" mt-4">
                                    <textarea name="Message" id="Message" placeholder="Message" class="m"></textarea>
                                </div>
                                <input type="checkbox" required=""> <label>Save my name, email, and website in this
                                    browser for the next time I comment</label>
                                <button type="submit" name="submit" class="btn btn-primary btn-style mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4 contact">
                        <address>
                            <h5 class="">Our Office Address</h5>
                            <p><span class="fa fa-map-marker"></span>Domum, 32, My Street, Trivandrum,
                                kerala </p>

                            <h5 class="mt-4 pt-lg-3">Phone informatiom</h5>
                            <p><span class="fa fa-mobile"></span> <strong>Phone :</strong>
                                <a href="tel:9054326681">9054326681</a></p>


                            <p> <span class="fa fa-envelope"></span> <strong>Email :</strong>
                                <a href="mailto:mail@example.com"> mail@example.com</a></p>
                        </address>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php include('includes/footer.php') ?>