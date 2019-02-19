<?php
session_start();
if(session_destroy()) // Prekida sve sesije
{
header("Location: ../index.php"); // Vraća na početnu stranicu
}
?>
