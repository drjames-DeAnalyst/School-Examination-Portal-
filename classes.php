<?php include "../config/db.php"; ?>

<?php
if(isset($_POST['add'])){
    $conn->query("INSERT INTO classes(class_name,section) VALUES('{$_POST['class']}','{$_POST['section']}')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Add Class</h3>

<form method="post">
<input name="class" placeholder="JSS 1A" required>
<select name="section">
<option>Nursery</option>
<option>Primary</option>
<option>JSS</option>
<option>SSS</option>
</select>
<button name="add">Add</button>
</form>

<h4>Classes</h4>
<?php
$res=$conn->query("SELECT * FROM classes");
while($row=$res->fetch_assoc()){
echo $row['class_name']." (".$row['section'].")<br>";
}
?>
</div>