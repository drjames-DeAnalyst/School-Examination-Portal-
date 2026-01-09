<?php include "../config/db.php"; ?>
<?php if(!isset($_SESSION['admin_id'])) exit; ?>

<?php
if(isset($_POST['add'])){
    $img = "uploads/".time().$_FILES['passport']['name'];
    move_uploaded_file($_FILES['passport']['tmp_name'], "../".$img);

    $conn->query("INSERT INTO students(full_name,gender,class_id,passport,admission_no)
    VALUES('{$_POST['name']}','{$_POST['gender']}','{$_POST['class']}','$img','{$_POST['adm']}')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Register Student</h3>

<form method="post" enctype="multipart/form-data">
<input name="name" placeholder="Student Name" required><br>
<input name="adm" placeholder="Admission No" required><br>
<select name="gender">
<option>Male</option>
<option>Female</option>
</select><br>
<select name="class">
<?php
$res=$conn->query("SELECT * FROM classes");
while($c=$res->fetch_assoc()){
echo "<option value='{$c['id']}'>{$c['class_name']}</option>";
}
?>
</select><br>
<input type="file" name="passport" required><br>
<button name="add">Save Student</button>
</form>
</div>