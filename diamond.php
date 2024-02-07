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

<h2>Diamond Homes</h2>
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
          <img src="images/properties/diamond1.jpg" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="images/properties/diamond2.jpg" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="images/properties/diamond3.png" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img src="images/properties/diamond4.jpg" class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p>Diamond homes is located in the heart of Kileleshwa, Othaya road just 10 minutes’ drive to Nairobi CBD. A 14 floor development comprising spacious studios, 2 and 3 bed apartments. </p>
  <p>Facilities: 2 high-speed lifts (from Germany) per block, gym, playing area for children, borehole, backup generator, DSTV and internet connection, customizable finishes, MDF wardrobes and cabinets, ample parking, splendid view of the forestry in Riverside and Arboretum, power saving instant water heaters and a raised garden on first floor.</p>
<p>Double security: Security scan at the gate and provision of swiping cards for the lifts, WIFI doorbell panoramic cameras accessible via mobile phones from anywhere, French windows allowing ample light in, CCTV cameras, solar water, intercom and alarm system</p>
<p>Amenities: High standard interior layout, spacious living room and dining hall, luxury bedrooms with washing room, French windows for big balconies, fashion decoration for indoor environment.</p>
<p>
Studio units (one balcony) 40 sq.m –<b> Kes. 6M (SOLD OUT)</b><br>
2 Bed (master en-suite, 2 balconies) 110 sq.m – <b>Kes. 11M Resale  (RENT: 80,000)</b><br>
3 Bed (two en-suite, 2 balconies) 120 sq.m –<b>Kes. 14M Resale (RENT: 85,000 – 106,000)</b>
</p>
  <b>FURNISHED RENTALS AVAILABLE (Request for Photos)</b>
  <p><b><i>Studio –</i></b> Kes. 95,000 (Daily: 4,500)  <br>
  <b><i>2 bedrooms master en-suite –</i></b>Kes. 150,000 – 160,000 (Daily: 7,000) <br>
  <b><i>3 bedrooms master en-suite –  </i></b>Kes. 160,000 – 250,000 (Daily: 10,000) <br>
</p>
  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8154789779746!2d36.77432967393766!3d-1.2846543356221798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f1b008b7eeebb%3A0xcff170bd97c21bd6!2sDiamond%20Homes%20Kileleshwa!5e0!3m2!1sen!2ske!4v1704614318315!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Ksh 6,000,000</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span>  Othaya Road, Kileleshwa </p>
  
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