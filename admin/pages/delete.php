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
    // Check if the product ID is provided in the URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $productId = $_GET['id'];

        // Start transaction
        $conn->begin_transaction();

        // Delete from property1 table
        $sqlDeleteProperty1 = "DELETE FROM property1 WHERE id = $productId";
        if ($conn->query($sqlDeleteProperty1) !== TRUE) {
            throw new Exception("Error deleting from property1: " . $conn->error);
        }

        // Delete from property2 table
        $sqlDeleteProperty2 = "DELETE FROM property2 WHERE id = $productId";
        if ($conn->query($sqlDeleteProperty2) !== TRUE) {
            throw new Exception("Error deleting from property2: " . $conn->error);
        }

        // Commit the transaction if all steps are successful
        $conn->commit();

        // Reset auto-increment counter for property1 table
        $sqlResetAutoIncrement1 = "ALTER TABLE property1 AUTO_INCREMENT = 1";
        if ($conn->query($sqlResetAutoIncrement1) !== TRUE) {
            throw new Exception("Error resetting auto-increment for property1: " . $conn->error);
        }

        // Reset auto-increment counter for property2 table
        $sqlResetAutoIncrement2 = "ALTER TABLE property2 AUTO_INCREMENT = 1";
        if ($conn->query($sqlResetAutoIncrement2) !== TRUE) {
            throw new Exception("Error resetting auto-increment for property2: " . $conn->error);
        }

        echo "Product with ID $productId deleted successfully!";
    } else {
        echo "Product ID not provided.";
    }
} catch (Exception $e) {
    // Roll back the transaction if any step fails
    $conn->rollback();
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn->close();
?>

<script>
    // JavaScript to alert and refresh the page after successful deletion
    alert("Product deleted successfully!");
    window.location.href = "allproducts.php";
</script>
