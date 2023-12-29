<?php
require_once '../backend/Contato.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Assuming your form fields are named 'name', 'email', 'subject', and 'message'
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create an instance of the Contato class
    $contato = new Contato();

    // Call the insert method to add the contact to the database
    $result = $contato->insert($name, $email, $subject, $message);

    // Check if the insertion was successful
    if ($result) {
        // Redirect back to the previous page with a success message
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?success=Contact inserted successfully!");
        exit();
    } else {
        // Redirect back to the previous page with an error message
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?error=" . urlencode($contato->getConnection()->error));
        exit();
    }
}
?>
