<?php
$conn = new mysqli("localhost", "root", "", "timzy_exam_portal");
if ($conn->connect_error) {
    die("Database connection failed");
}
session_start();
?>