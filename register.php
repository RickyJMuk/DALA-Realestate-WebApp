<?php include'header.php';?>
<!-- banner -->



<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
</div>
</div>
<!-- banner -->

    <style>
        .error-message {
            color: red;
        }
    </style>

<body>
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

  <form id="passwordForm"  method="post">
    <input type="text" class="form-control" placeholder="Full Name" name="user_name" required>
    <input type="email" class="form-control" placeholder="Enter Email" name="user_email" required>
    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
    <input type="password" class="form-control" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required>
    <span id="passwordError" class="error-message"></span>
    <button type="submit" class="btn btn-success" name="submit">Register</button>
</form>

   
        </div>
  
</div>
</div>
</div>

<?php include'footer.php';?>
<script>
document.getElementById('passwordForm').addEventListener('submit', function(event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var errorElement = document.getElementById('passwordError');

    if (password !== confirmPassword) {
        errorElement.textContent = 'Passwords do not match';
        event.preventDefault(); 
    } else {
        errorElement.textContent = ''; 
        // If passwords match, send an AJAX request to the server-side script
        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'your_action.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Handle the response from the server
                console.log(xhr.responseText);
            }
        };
        xhr.send(formData);
    }
});
</script>
</body>


