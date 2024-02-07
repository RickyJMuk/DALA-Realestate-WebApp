<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Hardcoded username and password for demonstration purposes
    $validEmail = "paulsongoga@gmail.com";
    $validPassword = "paul";

    // Retrieve user input
    $userEmail = isset($_POST['email']) ? $_POST['email'] : '';
    $userPassword = isset($_POST['password']) ? $_POST['password'] : '';

    // Check if the entered credentials match the valid ones
    if ($userEmail === $validEmail && $userPassword === $validPassword) {
        // Redirect to index.php on successful login
        header("Location: pages/index.php");
        exit();
    } else {
        // Display an error message or perform other actions for unsuccessful login
        $error="Invalid username or password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>DALA | ADMIN LOG IN</title>

        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

       
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">ADMIN Sign In</h3>
                        </div>
                        <div class="panel-body">
                        <form role="form" method="post" action="index.php">
                        <?php if (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
    <fieldset>
        <div class="form-group">
            <input class="form-control" placeholder="E-mail" name="email" type="email" >
        </div>
        <div class="form-group">
            <input class="form-control" placeholder="Password" name="password" type="password" >
        </div>
        <div class="checkbox">
            <label>
                <input name="remember" type="checkbox" value="Remember Me">Remember Me
            </label>
        </div>
        <!-- Change this to a button or input when using this as a form -->
        <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
    </fieldset>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>

    </body>

</html>
