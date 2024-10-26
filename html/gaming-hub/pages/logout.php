<?php
session_start();
session_destroy();

header("Location: /gaming-hub"); 
exit();
?>
