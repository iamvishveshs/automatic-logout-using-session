<?php
// Set a timeout period in seconds (1 minutes)
$timeout = 60;

// Check if the timeout field exists.
if (isset($_SESSION['timeout'])) {
    // Calculate the session's "time to live".
    $duration = time() - $_SESSION['timeout'];
    if ($duration > $timeout) {
        // Destroy the session and redirect the user to a logout page
        session_unset();
        session_destroy();
        header("Location: logout.php");
        exit();
    }
}

// Update the timeout field with the current time
$_SESSION['timeout'] = time();
?>
