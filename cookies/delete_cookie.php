<?php
// Set the cookie with a past expiration date to delete it
setcookie("user", "", time() - 3600, "/"); // Expire the cookie by setting expiration time to 1 hour ago

echo "The 'user' cookie has been deleted.";
