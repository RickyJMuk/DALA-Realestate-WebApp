<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>All Products</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>
</head>
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
    // Fetch data from both tables where IDs match
    $sql = "SELECT p1.id, p1.image, p1.name, p1.price, p2.details, p2.location, p2.agentName, p2.agentContact, p2.category, p2.image1, p2.image2, p2.image3
            FROM property1 p1
            INNER JOIN property2 p2 ON p1.id = p2.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        echo "<center><h2>All Products</h2></center>";
        echo "<table>
               
                <thead>
                    <tr>
                        
                        <th>Name</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Location</th>
                        <th>Agent Name</th>
                        <th>Agent Contact</th>
                        <th>Category</th>
                        <th>Image </th>
                        <th>Image 1 </th>
                        <th>Image 2 </th>
                        <th>Image 3 </th>
                    </tr>
                </thead>
                <tbody>";
               


        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
          
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>Ksh " . $row['price'] . "</td>";
            echo "<td>" . $row['details'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['agentName'] . "</td>";
            echo "<td>" . $row['agentContact'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo"<td><img src='uploads/" . $row['image'] . "' alt='Property Image'></td>";
            echo "<td><img src='" . $row['image1'] . "' alt='Property Image 1'></td>";
            echo "<td><img src='" . $row['image2'] . "' alt='Property Image 2'></td>";
            echo "<td><img src='" . $row['image3'] . "' alt='Property Image 3'></td>";

            echo "<td>
                    <button style='background-color: green;border:none;color:#fff;padding:5px;width:60px;' onclick='editProduct(" . $row['id'] . ")'>Edit</button>
                    <br><br>
                    <button style='background-color: red;border:none;color:#fff;padding:5px;width:60px;' onclick='deleteProduct(" . $row['id'] . ")'>Delete</button>
                  </td>";

            echo "</tr>";

            // JavaScript for confirmation
        echo "<script>
        function editProduct(id) {
            var confirmEdit = confirm('Do you want to edit this product?');
            if (confirmEdit) {
                // Redirect to the edit page with the product ID
                window.location.href = 'edit.php?id=' + id;
            }
        }

        function deleteProduct(id) {
            var confirmDelete = confirm('Do you want to delete this product?');
            if (confirmDelete) {
                // Redirect to the delete page with the product ID
                window.location.href = 'delete.php?id=' + id;
            }
        }
      </script>";
        }

        echo "</tbody>
            </table>";
    } else {
        echo "No matching records found.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>

                </div>
</div>
</body>
</html>
