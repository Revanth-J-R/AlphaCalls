<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "impulse102";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE TABLE new (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    size VARCHAR(5) NOT NULL,
    quantity INT(3) NOT NULL,
    price INT(6) NOT NULL
    )";

if ($conn->query($sql) === TRUE) {
    echo "Table YourTableName created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Extract data from the HTML table and insert it into the SQL table
$data = array();
$table = 'cartTable';
$result = $conn->query("SELECT * FROM $table");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

foreach ($data as $row) {
    $id = $row['ID'];
    $name = $row['Name'];
    $size = $row['Size'];
    $quantity = $row['Quantity'];
    $price = $row['Price'];

    $sql = "INSERT INTO new (id, name, size, quantity, price)
    VALUES ('$id', '$name', '$size', '$quantity', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>