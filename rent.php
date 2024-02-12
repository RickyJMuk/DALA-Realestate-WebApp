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
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Rent</span>
    <h2> Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    <input type="text" class="form-control" placeholder="Search of Properties">
    <div class="row">
            <div class="col-lg-5">
              <select class="form-control">
                <option>Rent</option>
              </select>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>Price</option>
                <option>Ksh 150,000 - Ksh 200,000</option>
                <option>Ksh 200,000 - Ksh 250,000</option>
                <option>Ksh 250,000 - Ksh 300,000</option>
                <option>Ksh 300,000 - above</option>
              </select>
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control">
                <option>Property Type</option>
                <option>Apartment</option>
                <option>Building</option>
                <option>Office Space</option>
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



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



?>
</div>


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: 12 of 100 </div>
  <div class="pull-right">
  <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select></div>

</div>
<div class="row">
     <!-- properties -->
     <?php
    $sql = "SELECT p1.*
        FROM property1 p1
        JOIN property2 p2 ON p1.id = p2.id
        WHERE p2.category = 'Rent'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 col-sm-6" > ';
        echo '<div class="properties" >';
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
        echo '</div>';
    }
} else {
    echo "No records found";
}


$conn->close();
?>

 </div>
</div>   
      
      
      <div class="center">
<ul class="pagination">
          <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li>
        </ul>
</div>

</div>
</div>
</div>
</div>
</div>

<?php include'footer.php';?>