<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Output JavaScript variable to indicate session status
if (!isset($_SESSION['user_logged_in'])) {
    echo "<script>var sessionEnded = true;</script>";
} else {
    echo "<script>var sessionEnded = false;</script>";
}
