<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "dala";

$conn = new mysqli($hostname, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $productID = $_GET['id'];

    // Fetch existing data for the specified product ID
    $sql = "SELECT p1.id, p1.image, p1.name, p1.price, p2.details, p2.location, p2.agentName, p2.agentContact, p2.category, p2.image1, p2.image2, p2.image3
            FROM property1 p1
            INNER JOIN property2 p2 ON p1.id = p2.id
            WHERE p1.id = $productID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Existing data retrieved, continue with the HTML form
    } else {
        // If no matching record found, redirect to allproducts.php
        header("Location: allproducts.php");
        exit();
    }
} else {
    // If no ID is provided, redirect to allproducts.php
    header("Location: allproducts.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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

    #details {
        width: 100%;
    }

    h1 {
        margin-top: 20px;
    }

    #category {
        margin-bottom: 10px;
    }
</style>
<body>
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


</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand"> ADMIN | DALA  AGENCIES</a>
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
    <!-- /.sidebar -->

    <div id="page-wrapper">
                <div class="container-fluid">

<h2>Edit Product</h2>

<form action="edit_function.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <!-- Display current image -->
    <label for="currentImage">Banner Image:</label>
    <img src="uploads/<?php echo $row['image']; ?>" alt="Banner Image" style="max-width: 200px;">

    
<br><br>
    <!-- Display images 1, 2, and 3 -->
    <label for="currentImage1">Slider Image 1:</label>
    <img src="<?php echo $row['image1']; ?>" alt="Slider Image 1" style="max-width: 200px;">

    
<br><br>
    <label for="currentImage2">Slider Image 2:</label>
    <img src="<?php echo $row['image2']; ?>" alt="Slider Image 2" style="max-width: 200px;">

    
<br><br>
    <label for="currentImage3">Slider Image 3:</label>
    <img src="<?php echo $row['image3']; ?>" alt="Slider Image 3" style="max-width: 200px;">

    
<br>
    <label for="name">Property Name:</label>
    <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="<?php echo $row['price']; ?>" required>

    <label for="details">Details:</label>
    <div id="quill-editor" style="height: 200px;"></div>
    <input type="hidden" id="details" name="details" value="<?php echo $row['details']; ?>" required>

    <label for="location">Location:</label>
    <input type="text" id="location" name="location" value="<?php echo $row['location']; ?>" required>

    <label for="agentName">Agent Name:</label>
    <input type="text" id="agentName" name="agentName" value="<?php echo $row['agentName']; ?>" required>

    <label for="agentContact">Agent Contact:</label>
    <input type="tel" id="agentContact" name="agentContact" value="<?php echo $row['agentContact']; ?>" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
        <option value="Rent" <?php echo ($row['category'] == 'Rent') ? 'selected' : ''; ?>>Rent</option>
        <option value="Sell" <?php echo ($row['category'] == 'Sell') ? 'selected' : ''; ?>>Sell</option>
        <option value="Featured" <?php echo ($row['category'] == 'Featured') ? 'selected' : ''; ?>>Featured</option>
        <option value="Hot_products" <?php echo ($row['category'] == 'Hot_products') ? 'selected' : ''; ?>>Hot Products</option>
        <option value="Recomended" <?php echo ($row['category'] == 'Recomended') ? 'selected' : ''; ?>>Recommended Products</option>
    </select>

    <input id="btn-form" type="submit" value="Save Changes">
</form>

                </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill = new Quill('#quill-editor', {
            theme: 'snow',
        });

        quill.root.innerHTML = '<?php echo addslashes($row['details']); ?>';

        quill.on('text-change', function () {
            // Update the hidden input with Quill content
            document.getElementById('details').value = quill.root.innerHTML;
        });
    });
</script>
</body>
</html>
<?php
// Close the database connection
$conn->close();
?>
