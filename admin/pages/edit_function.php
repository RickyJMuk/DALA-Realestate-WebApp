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
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the form
        $productId = isset($_POST["id"]) ? $_POST["id"] : "";
        $name = isset($_POST["name"]) ? $_POST["name"] : "";
        $price = isset($_POST["price"]) ? $_POST["price"] : "";
        $details = isset($_POST["details"]) ? $_POST["details"] : "";
        $location = isset($_POST["location"]) ? $_POST["location"] : "";
        $agentName = isset($_POST["agentName"]) ? $_POST["agentName"] : "";
        $agentContact = isset($_POST["agentContact"]) ? $_POST["agentContact"] : "";
        $category = isset($_POST["category"]) ? $_POST["category"] : "";

        // Start transaction
        $conn->begin_transaction();

        // Update data in property1 table
        $sqlUpdateProperty1 = "UPDATE property1 
                                SET name = '$name', price = '$price'
                                WHERE id = $productId";

        if ($conn->query($sqlUpdateProperty1) !== TRUE) {
            throw new Exception("Error updating property1: " . $conn->error);
        }

        // Update data in property2 table
        $sqlUpdateProperty2 = "UPDATE property2 
                                SET details = '$details', location = '$location', agentName = '$agentName', 
                                    agentContact = '$agentContact', category = '$category'
                                WHERE id = $productId";

        if ($conn->query($sqlUpdateProperty2) !== TRUE) {
            throw new Exception("Error updating property2: " . $conn->error);
        }

        // Commit the transaction if all steps are successful
        $conn->commit();

        echo "Data updated successfully!";

        // JavaScript to refresh the page and redirect
        echo '<script>
                setTimeout(function() {
                    window.location.href = "allproducts.php";
                }, 2000); // 2000 milliseconds (2 seconds) delay before redirecting
              </script>';
    } else {
        echo "Form not submitted.";
    }
} catch (Exception $e) {
    // Roll back the transaction if any step fails
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>
