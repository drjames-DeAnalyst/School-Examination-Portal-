<?php
include "../config/db.php";
if(!isset($_SESSION['admin_id'])){
    header("Location: ../auth/admin_login.php");
}
?>
<?php include "sidebar.php"; ?>

<div style="margin-left:240px;padding:20px;">
<h2>Admin Dashboard</h2>
<p>Welcome to Timzy International Education Centre</p>

<div style="display:flex;gap:20px;">
<div style="background:#e6f0ff;padding:20px;width:200px;">Sessions</div>
<div style="background:#ffe6e6;padding:20px;width:200px;">Classes</div>
<div style="background:#e6ffe6;padding:20px;width:200px;">Teachers</div>
</div>
</div>
<a href="../auth/logout.php">Logout</a>