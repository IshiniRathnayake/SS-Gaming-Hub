<?php
// Database connection
$host = 'localhost';
$dbname = 'gaming_website';
$user = 'root'; // Use a non-root user
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Secure data insertion
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $accountNumber = htmlspecialchars($_POST['account_number']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $expiryDate = htmlspecialchars($_POST['expiry_date']);
    $holderName = htmlspecialchars($_POST['holder_name']);

    $stmt = $pdo->prepare("INSERT INTO bank_details (account_number, cvv, expiry_date, holder_name) VALUES (?, ?, ?, ?)");
    $stmt->execute([$accountNumber, $cvv, $expiryDate, $holderName]);

    echo "Bank details saved successfully.";
}
