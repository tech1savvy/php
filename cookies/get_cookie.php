<?php
// Check if the cookie is set
if (isset($_COOKIE["user"])) {
    echo "Hello, " . $_COOKIE["user"] . "!";
} else {
    echo "Cookie is not set.";
}
