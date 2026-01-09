<?php include "../config/db.php"; ?>
<?php
$teacher = $_SESSION['teacher_id'];
$class = $conn->query("SELECT class_assigned FROM teachers WHERE id=$teacher")->fetch_assoc()['class_assigned'];

$cid = $conn->query("SELECT id FROM classes WHERE class_name='$class'")->fetch_assoc()['id'];
$res = $conn->query("SELECT * FROM students WHERE class_id=$cid");
?>

<h3>Students</h3>
<?php while($s=$res->fetch_assoc()){ ?>
<a href="scores.php?student=<?= $s['id'] ?>">
<?= $s['full_name'] ?>
</a><br>
<?php } ?>