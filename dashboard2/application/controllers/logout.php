<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
header("Location: ../login"); // Langsung mengarah ke Home index.php
}