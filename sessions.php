<?php include "../config/db.php"; ?>
<?php if(!isset($_SESSION['admin_id'])) exit; ?>

<?php
if(isset($_POST['add'])){
    $conn->query("UPDATE sessions SET status='inactive'");
    $conn->query("INSERT INTO sessions(session_name,status) VALUES('{$_POST['name']}','active')");
}
?>

<?php include "sidebar.php"; ?>
<div style="margin-left:240px;padding:20px;">
<h3>Create Academic Session</h3>

<form method="post">
<input name="name" placeholder="2024/2025" required>
<button name="add">Save Session</button>
</form>

<h4>Existing Sessions</h4>
<?php
$res=$conn->query("SELECT * FROM sessions");
while($row=$res->fetch_assoc()){
echo $row['session_name']." - ".$row['status']."<br>";
}
?>
</div>