<?php
// Set a cookie that expires in 1 hour
$cookie_name = "user";
$cookie_value = "John Doe";

// setcookie(name, value, expiration time, path)
setcookie($cookie_name, $cookie_value, time() + (60 * 60), "/"); // 1 hour expiration

// Check if the cookie is set
if (isset($_COOKIE[$cookie_name])) {
    echo "Welcome back, " . $_COOKIE[$cookie_name] . "!";
} else {
    echo "Welcome, new user!";
}
