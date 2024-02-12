<?php include'header.php';?>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dala";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

// Retrieve data from the property1 table
$query = "SELECT * FROM property1";
$result = $conn->query($query);

?>

<div class="">
    

            <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">
        
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
              <h2><a href="karen.php">2 Bed Rooms and 3 Dinning Room Aparment on Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Kilimani, Nairobi</p>
              <p>2 & 3 bedrooms near Junction Mall. Has pool, gym, kid’s play area, intercom, generator, borehole.</p>
              <cite>Ksh 20,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2><a href="elina.php">2 bedroom apartments for rent in nairobi</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Kileleshwa, Mandera road</p>
              <p>High end 2 bedrooms along Riverside Drive. Has pool, kid’s play area, gym, borehole.</p>
              <cite>Ksh 188,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2><a href="riverside.php">1 & 2 bedroom apartments Available for Sale & Rent</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Riverside</p>
              <p>Grand Riverside Residences stunning apartments for sale along Riverside drive.Ready for occupation.</p>
              <cite>Ksh 23,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2><a href="oasis.php">2 bedroom apartments Available for Rent & Sale</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span>  Oloitoktok road, Siaya Park</p>
              <p>Siaya Park apartments are located off Oloitoktok road. They are made with the highest spec of finishing for the area. The building con­sists of 14 floors, situated in a serene locale with easy access to schools, hotels and restaurants, Sports Park, transportation services and shopping malls.</p>
              <cite>Ksh 13,000,000</cite>
              </blockquote>
            </div>
          </div>
          
          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2><a href="elina.php">Furnished Apartment Spacious 2 beds all en-suite Available for Rent</a></h2>
              <blockquote>              
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Kileleshwa, Mandera road</p>
              <p>Asking Kes. 9,000 per day or Kes. 140,000 monthly. Unfurnished available Kes. 90,000 per month (inclusive).</p>
              <cite>Ksh 140,000</cite>
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->



        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
  <div class="container"> 
    <!-- banner -->
    <h3>Buy, Sale & Rent</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Search of Properties">
          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Buy</option>
                <option>Rent</option>
                <option>Sale</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Price</option>
                <option>Ksh150,000 - Ksh200,000</option>
                <option>Ksh200,000 - Ksh250,000</option>
                <option>Ksh250,000 - Ksh300,000</option>
                <option>Ksh300,000 - above</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Property</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
              <div class="col-lg-3 col-sm-4">
              <button class="btn btn-success"  onclick="window.location.href='sale.php'">Find Now</button>
              </div>
          </div>
          

        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Join now and get updated with all the properties deals.</p>
          <a href="register.php">
    <button class="btn btn-info">Join Us</button>
</a>
   </div>
      </div>
    </div>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer"> <a href="buysalerent.php" class="pull-right viewall">View All Listing</a>
    <h2>Featured Properties</h2>
    <div id="owl-example" class="owl-carousel">
   <?php
    $sql = "SELECT p1.*
        FROM property1 p1
        JOIN property2 p2 ON p1.id = p2.id
        WHERE p2.category = 'featured'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="properties">';
        echo '<div class="image-holder"><img src="admin/pages/uploads/' . $row["image"] . '" alt="Property Image">';
        echo '<div class="status sold">Available</div></div>';
        echo '<h4><a href="property_details.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h4>';
        echo '<p class="price">Price: Ksh ' . $row["price"] . '</p>';
        echo '<div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span>';
        echo '<span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span>';
        echo '<span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span>';
        echo '<span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span></div>';
        echo '<a class="btn btn-primary" href="property_details.php?id=' . $row["id"] . '">View Details</a>';
        echo '</div>';
    }
} else {
    echo "No records found";
}



?>

   
      
      
      
      
     
      
      
      

      
    </div>
  </div>
  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>About Us</h3>
        <p>DALA Agencies is a distinguished name in the real estate industry, driven by a commitment to excellence, transparency, and customer-centricity. With a focus on transforming dreams into addresses, DALA stands out for its dedicated team of professionals who bring expertise and innovation to the forefront. The agency's approach goes beyond transactions, emphasizing the creation of lasting relationships with clients. From first-time homebuyers to seasoned investors, DALA offers personalized consultations to meet diverse needs. Their portfolio spans a range of properties, ensuring a suitable option for every individual or family. With a vision to redefine the real estate experience, DALA Agencies invites clients to embark on a seamless and fulfilling journey in the world of possibilities. Welcome to DALA Agencies – Your Partner in Property.<br><a href="about.php">Learn More</a></p>
      
      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommended Properties</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <?php
    $sql = "SELECT p1.*
        FROM property1 p1
        JOIN property2 p2 ON p1.id = p2.id
        WHERE p2.category = 'Recomended'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo '<div class="carousel-inner">';
  $active = true;

  while ($row = $result->fetch_assoc()) {
      echo '<div class="item ' . ($active ? 'active' : '') . '">
              <div class="row">
                  <div class="col-lg-4"><img src="admin/pages/uploads/' . $row["image"] . '" alt="Property Image" class="img-responsive" /></div>
                  <div class="col-lg-8">
                      <h5><a href="property_details.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h5>
                      <p class="price">Price: Ksh ' . $row["price"] . '</p>
                      <a href="property_details.php?id=' . $row["id"] . '" class="more">More Detail</a>
                  </div>
              </div>
          </div>';

      $active = false; // Set active to false after the first item
  }

  echo '</div>';
} else {
  echo "No records found";
}

$conn->close();
?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include'footer.php';?>