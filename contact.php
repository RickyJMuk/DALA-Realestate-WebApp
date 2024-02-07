<?php
include 'config_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form is submitted
    $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : '';
    $email_address = isset($_POST['email_address']) ? $_POST['email_address'] : '';
    $contact_number = isset($_POST['contact_number']) ? $_POST['contact_number'] : '';
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
    $message = mysqli_real_escape_string($conn, $message);

    // Check if required fields are not empty
    if (!empty($full_name) && !empty($email_address) && !empty($contact_number) && !empty($message)) {
        // Insert into the database
        $sql = "INSERT INTO contact_us (full_name, email_address, contact_number, message)
                VALUES ('$full_name', '$email_address', '$contact_number', '$message')";

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
    <span class="pull-right"><a href="#">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">

<form method="POST" action="contact.php">
                <input type="text" class="form-control" placeholder="Full Name" name="full_name">
                <input type="text" class="form-control" placeholder="Email Address" name="email_address">
                <input type="text" class="form-control" placeholder="Contact Number" name="contact_number">
                <textarea rows="6" class="form-control" placeholder="Message" name="message"></textarea>
      <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
      </form>         


                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  <div class="well"><iframe width="100%" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8690312725807!2d36.87121897393732!3d-1.249881735585258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f142c73b3f153%3A0xc2bc30c52c1867c9!2sRaila%20Odinga%20Rd%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1704463300844!5m2!1sen!2ske" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
  </div>
</div>
</div>
</div>




<?php include'footer.php';?>
