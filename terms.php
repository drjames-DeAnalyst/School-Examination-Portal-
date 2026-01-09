<?php include "../config/db.php"; ?>
<?php if(!isset($_SESSION['admin_id'])) exit; ?>

<?php
if(isset($_POST['add'])){
    $conn->query("UPDATE terms SET status='inactive'");
    $conn->query("INSERT INTO terms(term_name,status) VALUES('{$_POST['name']}','active')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Create Term</h3>

<form method="post">
<select name="name">
<option>First Term</option>
<option>Second Term</option>
<option>Third Term</option>
</select>
<button name="add">Activate</button>
</form>

<h4>Terms</h4>
<?php
$res=$conn->query("SELECT * FROM terms");
while($row=$res->fetch_assoc()){
echo $row['term_name']." - ".$row['status']."<br>";
}
?>
</div>