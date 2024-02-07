<?php
include 'config_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form is submitted
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $email_address = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $contact_number = isset($_POST['user_number']) ? $_POST['user_number'] : '';
    $user_property = isset($_POST['user_property']) ? $_POST['user_property'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';

    // Establish the database connection
    $conn = new mysqli("localhost", "root", "", "dala");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and sanitize input
    $full_name = mysqli_real_escape_string($conn, $full_name);
    $email_address = mysqli_real_escape_string($conn, $email_address);
    $contact_number = mysqli_real_escape_string($conn, $contact_number);
    $user_property = mysqli_real_escape_string($conn, $user_property);
    $message = mysqli_real_escape_string($conn, $message);

    // Check if required fields are not empty
    if (!empty($full_name) && !empty($email_address) && !empty($contact_number) && !empty($user_property) && !empty($message)) {
        // Insert into the database
        $sql = "INSERT INTO messages (full_name, user_email, user_number, user_property, message)
                VALUES ('$full_name', '$email_address', '$contact_number','$user_property', '$message')";

        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: All fields are required";
    }

    $conn->close();
}
?>

<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Rent</span>
    <h2>Rent/Buy</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
<div class="row">
                <div class="col-lg-4 -sm-5"><img src="images/properties/sale9buy.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 cocoll-sm-7">
                  <h5><a href="kamulu.php">Kamulu , Josca</a></h5>
                  <p class="price">Ksh 14,234,900</p> </div>
              </div>
<div class="row">
<div class="col-lg-4 col-sm-5"><img src="images/properties/sale6buy.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="runda.php">Runda , Kiambu Road</a></h5>
                  <p class="price">Ksh 64,234,900</p> </div>
              </div>

<div class="row">
<div class="col-lg-4 col-sm-5"><img src="images/properties/sale4buy.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="buru.php">Buruburu, Embakasi East</a></h5>
                  <p class="price">Ksh 34,234,900</p> </div>
              </div>

<div class="row">
<div class="col-lg-4 col-sm-5"><img src="images/properties/sale12buy.jpg" class="img-responsive img-circle" alt="properties"></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="tasiab.php">Tasia B , Embakasi</a></h5>
                  <p class="price">Ksh 22,234,900</p> </div>
              </div>

</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/properties/sale7buy.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2>Kings Serenity</h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="images/properties/serenity1.jpg" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="images/properties/serenity2.jpg" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="images/properties/serenity3.jpg" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img src="images/properties/serenity4.jpg" class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p>Kings serenity is located in Ongata Rongai, just 300 metres from the highway and 700 metres from Maasai Mall. Comprises of 2-bed apartments, with typical compact design throughout, lounge-cum dining, kitchen with dry yard, separate toilet and shower. Is approximately 93 SQ.M offering the space, comfort and luxury. Kings serenity has a well-planned layout with green spaces and attractive landscaping. Has 1 parking slot per unit and over 30 slots for visitors. </p>
  <p>Features and amenities: Kids play area, secured masonry boundary wall, controlled access and well planned security checkpoints, solar street lighting, borehole with overhead storage tank, cabro-paving blocks to drive ways and community hall to the society. </p>
  <p>Location advantage: convenient location within Rongai town, choice of many good schools, nearby institutions, commercial centers, banks, fuel station and easy access to public transport. </p>
  <p><b><i>Sale option:</i></b> <b>Kes. 4M cash</b> <br>
  <b><i> Rental Option:</i></b> <b> Kes. 25,000 per month (one month’s deposit and 2,000 water deposit)</p>
  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6259172719215!2d36.76109647393831!3d-1.4008235357598628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f0537e38b0adb%3A0x78ccb2ab18ad447a!2sKings%20Serenity!5e0!3m2!1sen!2ske!4v1704554316728!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Ksh 4,000,000</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> Opposite ORCC, Ongata Rongai</p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p>GNA<br>+254 7134 565 33</p>
  </div>
</div>

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span>Post Enquiry.We will call/email you.</h6>
  <form role="form" method="post">
                <input type="text" class="form-control" placeholder="Full Name" name="full_name"/>
                <input type="text" class="form-control" placeholder="you@yourdomain.com" name="user_email"/>
                <input type="text" class="form-control" placeholder="your number" name="user_number"/>
                <input type="text" class="form-control" placeholder="property interested in " name="user_property"/>
                <textarea rows="6" class="form-control" placeholder="Whats on your mind?" name="message"></textarea>
      <button type="submit" class="btn btn-primary" name="Submit">Send Message</button>
      </form>
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>