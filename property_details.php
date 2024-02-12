<?php include 'config_db.php'; ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dala";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

// Initialize properties array
$properties = [];

// Retrieve the ID from the query parameter
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id !== null) {
    // Query to retrieve details from both tables based on the ID
    $sql = "SELECT * FROM property1 WHERE id = $id";
    $result1 = $conn->query($sql);

    $sql = "SELECT * FROM property2 WHERE id = $id";
    $result2 = $conn->query($sql);

    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
        // Output data for the clicked row from property1
        // Output data for the clicked row from property1
$row1 = $result1->fetch_assoc();

$properties['image1'] = "admin/pages/uploads/" . $row1["image"];
$properties['name'] = $row1["name"];
$properties['price'] = $row1["price"];
// Add more details from property1 as needed

// Output data for the clicked row from property2
$row2 = $result2->fetch_assoc();
$properties['image2'] = isset($row2["image1"]) ? "admin/pages/" . $row2["image1"] : null;
$properties['image3'] = isset($row2["image2"]) ? "admin/pages/" . $row2["image2"] : null;
$properties['image4'] = isset($row2["image3"]) ? "admin/pages/" . $row2["image3"] : null;
$properties['details'] = $row2["details"];
$properties['location'] = $row2["location"];
$properties['agentName'] = $row2["agentName"];
$properties['agentContact'] = $row2["agentContact"];
$properties['category'] = $row2["category"];
    } else {
        echo "No records found for the given ID.";
    }
} else {
    echo "ID parameter not provided.";
}
// Retrieve data from the property1 table
$query = "SELECT * FROM property1";
$result = $conn->query($query);


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
<?php
    $sql = "SELECT p1.*
        FROM property1 p1
        JOIN property2 p2 ON p1.id = p2.id
        WHERE p2.category = 'Hot_products'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
    

               echo' <div class="row">';
               echo' <div class="col-lg-4 -sm-5"><img src="admin/pages/uploads/' . $row["image"] . '" alt="Property Image" class="img-responsive img-circle">';
               echo '</div>';
               echo' <div class="col-lg-8 col-sm-7">';
               echo' <h5><a href="property_details.php?id=' . $row["id"] . '">' . $row["name"] . '</a></h5>';
               echo' <p class="price">Price: Ksh ' . $row["price"] . '</p> </div>';
               echo' </div>';
               

               
    }
} else {
    echo "No records found";
}


$conn->close();
?>

</div>


<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="images/properties/sale7buy.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $properties['name'] = $row1["name"];?></h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators hidden-xs">
        <?php
        // Determine the number of images dynamically
        $imageCount = 4;

        for ($i = 0; $i < $imageCount; $i++) {
            echo '<li data-target="#myCarousel" data-slide-to="' . $i . '" class="' . ($i === 0 ? 'active' : '') . '"></li>';
        }
        ?>
    </ol>
    <div class="carousel-inner">
        <?php
        // Displaying images in the carousel
        for ($i = 1; $i <= $imageCount; $i++) {
            $imageVar = 'image' . $i;
            $imagePath = $properties[$imageVar];

            // Check if the image path is not null or empty
            if ($imagePath) {
                echo '<div class="item ' . ($i === 1 ? 'active' : '') . '">';
                echo '<img src="' . $imagePath . '" alt="Property Image ' . $i . '" class="img-responsive">';
                echo '</div>';
            }
        }
        ?>
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- #Slider Ends -->





  </div>
  



  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p><?php echo $properties['details'] = $row2["details"];?></p>
  </div>
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well"><iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8377930219876!2d36.78625107393756!3d-1.2702810356066674!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f177b83295183%3A0x1028ba1136b573ac!2s108%20Riverside%20Apartments!5e0!3m2!1sen!2ske!4v1704559887152!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  </div>

  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo $properties['price'] = $row1["price"]; ?></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $properties['location'] = $row2["location"]; ?> </p>
  
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p><?php echo $properties['agentName'] = $row2["agentName"];?><br><?php echo $properties['agentContact'] = $row2["agentContact"];?></p>
  </div>
</div>
        
        

    <h6><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry.We will call/email you.</h6>
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