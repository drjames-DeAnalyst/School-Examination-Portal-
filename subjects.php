<?php include "../config/db.php"; ?>

<?php
if(isset($_POST['add'])){
    $conn->query("INSERT INTO subjects(subject_name,section) VALUES('{$_POST['subject']}','{$_POST['section']}')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Add Subject</h3>

<form method="post">
<input name="subject" placeholder="Mathematics" required>
<select name="section">
<option>Nursery</option>
<option>Primary</option>
<option>JSS</option>
<option>SSS</option>
</select>
<button name="add">Save</button>
</form>

<h4>Subjects</h4>
<?php
$res=$conn->query("SELECT * FROM subjects");
while($row=$res->fetch_assoc()){
echo $row['subject_name']." - ".$row['section']."<br>";
}
?>
</div>