<?php

session_start();
session_unset();
session_destroy();

echo "Logged out";
echo "<form action='http://localhost:8888/FindFolks/index.php'>
<button>Login Page</button>
</form>";

?>