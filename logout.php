<?php
include("sql_query\config.php");
session_unset();
session_destroy();
header("Location: index.php");  
?>