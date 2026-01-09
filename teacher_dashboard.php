<?php include "../config/db.php"; ?>
<?php if(!isset($_SESSION['teacher_id'])) header("Location: login.php"); ?>

<?php
$teacher = $_SESSION['teacher_id'];
$t = $conn->query("SELECT class_assigned FROM teachers WHERE id=$teacher")->fetch_assoc();
$class = $t['class_assigned'];
?>

<div style="padding:20px;">
<h2>Teacher Dashboard</h2>
<p>Class Assigned: <b><?= $class ?></b></p>

<a href="students.php">Enter Scores</a>
</div>