<?php
class MessageController extends Controller{

    public function create(){
        // Connect to the database
        $connection = mysqli_connect("hostname", "username", "password", "database_name");
    }
    // Connect to the database
    $connection = mysqli_connect("hostname", "username", "password", "database_name");

    // Check for new messages
    if(isset($_POST['new_message'])) {
        // Save the new message to the database
        $message = $_POST['new_message'];
        $user = $_POST['user'];
        mysqli_query($connection, "INSERT INTO messages (user, message) VALUES ('$user', '$message')");
    }

    // Retrieve all messages from the database
    $result = mysqli_query($connection, "SELECT * FROM messages ORDER BY id DESC");
    $messages = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>
