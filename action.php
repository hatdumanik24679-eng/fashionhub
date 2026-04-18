<?php

// DB connection
$conn = new mysqli("localhost", "root", "", "fashion_hub");

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// form data
$number = $_POST['number'] ?? '';
$cid = $_POST['cid'] ?? '';

// insert query
$stmt = $conn->prepare("INSERT INTO gift_cards (number, cid) VALUES (?, ?)");
$stmt->bind_param("ss", $number, $cid);

if ($stmt->execute()) {
    echo "Saved Successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>