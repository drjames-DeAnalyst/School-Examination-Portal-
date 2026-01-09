<?php include "../config/db.php"; ?>

<?php
if(isset($_POST['add'])){
    $hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $conn->query("INSERT INTO teachers(full_name,email,password,class_assigned)
    VALUES('{$_POST['name']}','{$_POST['email']}','$hash','{$_POST['class']}')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Register Teacher</h3>

<form method="post">
<input name="name" placeholder="Full Name" required><br>
<input name="email" type="email" required><br>
<input name="password" placeholder="Strong Password" required><br>
<select name="class">
<?php
$res=$conn->query("SELECT * FROM classes");
while($c=$res->fetch_assoc()){
echo "<option>{$c['class_name']}</option>";
}
?>
</select><br>
<button name="add">Register</button>
</form>

<h4>Teachers</h4>
<?php
$res=$conn->query("SELECT * FROM teachers");
while($t=$res->fetch_assoc()){
echo $t['full_name']." - ".$t['class_assigned']."<br>";
}
?>
</div>