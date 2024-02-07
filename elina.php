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

<h2>Elina Residences</h2>
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
          <img src="images/properties/elina1.jpg" class="properties" alt="properties" />
        </div>
        <!-- #Item 1 -->

        <!-- Item 2 -->
        <div class="item">
          <img src="images/properties/elina2.jpg" class="properties" alt="properties" />
         
        </div>
        <!-- #Item 2 -->

        <!-- Item 3 -->
         <div class="item">
          <img src="images/properties/elina3.jpg" class="properties" alt="properties" />
        </div>
        <!-- #Item 3 -->

        <!-- Item 4 -->
        <div class="item ">
          <img src="images/properties/elina4.jpg" class="properties" alt="properties" />
          
        </div>
        <!-- # Item 4 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p>Purple Dot International is delighted to present Elina Residences, the most exclusive and contemporary mid-level high rise residential apartments and penthouses featuring 60 three bedroom apartments and 4 4,200 Sq.ft duplex penthouses.  </p>
  <p>The property’s functional yet aesthetic design is inspired by contemporary suburban lifestyle with a penchant for an elegant yet warm, family environment. The designers have kept in mind the need for customization to suit individual residents’ with tasteful finishes, bespoke interiors for this winner of the 2018 Real Estate Excellence Awards.</p>
  <p>Each residential penthouse benefits from an open plan layout in the living area, complimented by full height sliding doors that create a seamless flow from inside to outside while looking out to a panoramic view of suburban Nairobi.</p>
<p>
Amenities: Spacious sitting lounge, fitted kitchen, gym, DSQ, generator, steam room, CCTV surveillance, high speed lifts, guard house, solar and manual water heating system, banquet hall, separate intercom, 2 car park per apartment and visitor parking (2 level basement parking).
</p>
  <p><b><i>3 bed all en-suite plus DSQ (204 sq.m) –</i></b> Kes. 23M (RENT FROM KES. 160,000 Upper floors) <br>
  <b><i>4 Bed all en-suite duplex penthouse plus DSQ (390 sq.m) – </i></b>Kes. 55M (4 parking slots, family room, 3 bedrooms with large balconies etc)  <br>
</p>
  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8309247035268!2d36.78625847393751!3d-1.2747224356114373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f175269049a29%3A0x85ee38ba2d3e2c0b!2sElina%20Residences!5e0!3m2!1sen!2ske!4v1704616549420!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price">Ksh 55,000,000</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> Kileleshwa, Mandera road </p>
  
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