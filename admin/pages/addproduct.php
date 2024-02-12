<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dala";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

try {
    // Start transaction
    $conn->begin_transaction();

    // Inserting products1
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        $targetDirectory = "uploads/";
        $image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
        $targetFile = $targetDirectory . basename($image);

        if (isset($_FILES["image"]["tmp_name"]) && !empty($_FILES["image"]["tmp_name"])) {
            move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile);

            // Retrieve data from the form
            $name = isset($_POST["name"]) ? $_POST["name"] : "";
            $price = isset($_POST["price"]) ? $_POST["price"] : "";

            // Validate 'price' is not empty before inserting into the database
            if (!empty($price)) {
                // Insert data into the property1 table
                $sql = "INSERT INTO property1 (image, name, price) VALUES ('$image', '$name', '$price')";

                if ($conn->query($sql) !== TRUE) {
                    throw new Exception("Error inserting into property1: " . $conn->error);
                }
            } else {
                throw new Exception("'price' cannot be empty.");
            }
        }
    }

    // Inserting products2
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $details = isset($_POST["details"]) ? $_POST["details"] : "";
        $location = isset($_POST["location"]) ? $_POST["location"] : "";
        $agentName = isset($_POST["agentName"]) ? $_POST["agentName"] : "";
        $agentContact = isset($_POST["agentContact"]) ? $_POST["agentContact"] : "";
        $category = isset($_POST["category"]) ? $_POST["category"] : "";

        // Handle image uploads for property2
        $image1 = uploadImage('image1');
        $image2 = uploadImage('image2');
        $image3 = uploadImage('image3');

        // Insert data into the property2 table
        $sql = "INSERT INTO property2 (details, location, agentName, agentContact, image1, image2, image3, category)
                VALUES ('$details', '$location', '$agentName', '$agentContact', '$image1', '$image2', '$image3', '$category')";

        if ($conn->query($sql) !== TRUE) {
            throw new Exception("Error inserting into property2: " . $conn->error);
        }
    }

    // Commit the transaction if all steps are successful
    $conn->commit();
    echo "Data inserted successfully!";
} catch (Exception $e) {
    // Roll back the transaction if any step fails
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Function to handle image uploads
function uploadImage($inputName) {
    global $conn;
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES[$inputName]["name"]);
    move_uploaded_file($_FILES[$inputName]["tmp_name"], $targetFile);

    // Check if the image upload was successful
    if (!file_exists($targetFile)) {
        throw new Exception("Error uploading image for $inputName");
    }

    return $targetFile;
}



// Close the database connection
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ADMIN | DALA AGENCIES</title>

        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="../css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="../css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html"> ADMIN | DALA  AGENCIES</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="../../index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> Admin <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>

            <aside class="sidebar navbar-default" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="messages.php"><i class="fa fa-comments fa-fw"></i> Messages</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="newsletter.php"><i class="fa fa-newspaper-o fa-fw"></i> Newsletter Subscriptions</a>
                        </li>
                        <li>
                            <a href="inquiries.php"><i class="fa fa-tasks fa-fw"></i> Inquiries</a>
                        </li>
                        <li>
                            <a href="users.php"><i class="fa fa-user fa-fw"></i> Registered Users</span></a>
                        </li>
                        <li><br></li>
                        <li>
                            <a href="addproduct.php"><i class="fa fa-plus fa-fw"></i> Add Products</span></a>
                            </li>
                            <li>
                            <a href="allproducts.php"><i class="fa fa-list fa-fw"></i> All Products</span></a>
                            </li>

                       
                    </ul>
                </div>
            </aside>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        #btn-form {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 25%;
            width: 40%;
        }

        #btn-form:hover {
            background-color: #45a049;
         
        }
        #details{
            width: 100%;
            
        }
        h1{
            margin-top: 20px;
        }
        #category{
            margin-bottom: 10px;

        }
    </style>
</head>
<body>
<div id="page-wrapper">
        <div class="container-fluid">
                    <form id="propertyForm" action="addproduct.php" method="post" enctype="multipart/form-data">
                        <h1>Add Products</h1>
                        <hr>
                        <label for="image">Property Image:</label>
                        <input type="file" id="image" name="image" accept="image/*" required>

                        <label for="name">Property Name:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="price">Price:</label>
                        <input type="number" id="price" name="price" required>

                        <label for="details">Details:</label>
                        <div id="quill-editor" style="height: 200px;"></div>
                        <input type="hidden" id="details" name="details" required>

                        <label for="location">Location:</label>
                        <input type="text" id="location" name="location" required>

                        <label for="agentName">Agent Name:</label>
                        <input type="text" id="agentName" name="agentName" required>

                        <label for="agentContact">Agent Contact:</label>
                        <input type="tel" id="agentContact" name="agentContact"  required>
                        
                        <label for="otherImages">Other Images:</label>
                        <input type="file" id="image1" name="image1" accept="image/*" required>
                        <input type="file" id="image2" name="image2" accept="image/*" required>
                        <input type="file" id="image3" name="image3" accept="image/*" required>

                        <label for="category">Category:</label>
                        <select id="category" name="category" required>
                            <option value="Rent">Rent</option>
                            <option value="Sell">Sell</option>
                            <option value="Featured">Featured</option>
                            <option value="Hot_products">Hot Products</option>
                            <option value="Recomended">Recommended Products</option>
                        </select>

                        <button id="btn-form"type="submit">Submit</button>
                    </form>

    </div>
</div>










<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
        });

        quill.on('text-change', function () {
            // Update the hidden input with Quill content
            document.getElementById('details').value = quill.root.innerHTML;
        });
    });
</script>

</body>
</html>
