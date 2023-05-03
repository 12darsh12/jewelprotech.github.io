<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
try{
    $pdo = new PDO("mysql:host=localhost;dbname=jewelprotech", "root", "");
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
 
// Attempt insert query execution
try{
    // Create prepared statement
    $sql = "INSERT INTO information (f_name, l_name, phone_number, email, messages) VALUES (:f_name, :l_name, :phone_number, :email, :messages)";
    $stmt = $pdo->prepare($sql);
    
    // Bind parameters to statement
    $stmt->bindParam(':f_name', $_REQUEST['f_name']);
    $stmt->bindParam(':l_name', $_REQUEST['l_name']);
    $stmt->bindParam(':phone_number', $_REQUEST['phone_number']);
    $stmt->bindParam(':email', $_REQUEST['email']);
    $stmt->bindParam(':messages', $_REQUEST['messages']);
    
    // Execute the prepared statement
    $stmt->execute();
    echo "<script>alert('record inserted successfully')</script>";
    echo "<script>window.open('contact.php','_self')</script>";

} catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
?>