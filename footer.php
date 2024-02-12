<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email_address = isset($_POST['user_email']) ? trim($_POST['user_email']) : '';

    // Check if email address is not empty
    if (!empty($email_address)) {
        $conn = new mysqli("localhost", "root", "", "dala");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO `newsletter` (`user_email`) VALUES ('$email_address')";

        if ($conn->query($sql) === TRUE) {
            // Successful insertion
            exit(); // Ensure that no more content is sent after the redirect
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error: Email address cannot be empty";
    }
}
?>



<div class="footer">

<div class="container">



<div class="row">
            <div class="col-lg-3 col-sm-3">
                   <h4>Information</h4>
                   <ul class="row">
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.php">About</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Agents</a></li>         
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.php">Blog</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.php">Contact</a></li>
              </ul>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Newsletter</h4>
                    <p>Get notified about the latest properties in our marketplace.</p>
                    <form class="form-inline"  method="post" >
                            <input type="text" placeholder="Enter Your email address" class="form-control" name="user_email">
                                <input class="btn btn-success" type="submit" value="Notify Me"></form>
            </div>
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Follow us</h4>
                    <a href="#"><img src="images/facebook.png" alt="facebook"></a>
                    <a href="#"><img src="images/twitter.png" alt="twitter"></a>
                    <a href="#"><img src="images/linkedin.png" alt="linkedin"></a>
                    <a href="#"><img src="images/instagram.png" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Contact us</h4>
                    <p><b>DALA AGENCIES REAL ESTATE </b><br>
<span class="glyphicon glyphicon-map-marker"></span> Raila Odinga Street, Nairobi <br>
<span class="glyphicon glyphicon-envelope"></span> hello@dalagencies.com<br>
<span class="glyphicon glyphicon-earphone"></span> +254 7123 4565 78</p>
            </div>
        </div>
<p class="copyright">Copyright 2024. All rights reserved.	</p>


</div></div>

<?php
include 'config_db.php';

// Initialize login feedback message
$loginMessage = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user input
    $user_email = isset($_POST['user_email']) ? $_POST['user_email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "dala");

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement to fetch user data
    $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if there is a matching user
    if ($result->num_rows > 0) {
        // User login successful
        $loginMessage = "Login successful!";
        // You can redirect the user to another page or perform other actions here.
    } else {
        // Invalid credentials
        $loginMessage = "User Logged In.";
    }

    // Close the database connection
    $conn->close();
}
?>

<!-- Display login feedback using JavaScript -->
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Get the login message from PHP
        var loginMessage = "<?php echo $loginMessage; ?>";

        // Display a pop-up alert based on the login message
        if (loginMessage.trim() !== "") {
            alert(loginMessage);
        }
    });
</script> -->


<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
          <h4>Login</h4>
          <div class="login-feedback">
            <?php echo $loginMessage; ?>
          </div>
          <form class="" role="form" method="post">
    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail2">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword2">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password">
    </div>
    <div class="checkbox">
        <label>
            <input type="checkbox"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-success">Sign in</button>
</form>
        </div>
        <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info" onclick="window.location.href='register.php'">Join Now</button>
        </div>
      </div>
    </div>
  </div>
</div>



<!-- /.modal -->



</body>
</html>

