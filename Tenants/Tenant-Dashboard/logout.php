<?php
// Start the session (this should be done at the beginning of every PHP page)
session_start();

// Destroy the session to log out the user
session_destroy();

// Redirect the user to the login page after logout
header('Location: http://localhost/Bari-Wala/');
exit;
?>
