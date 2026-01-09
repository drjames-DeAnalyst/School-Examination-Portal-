<?php include "../config/db.php"; ?>

<?php
if(isset($_POST['login'])){
    if($_POST['captcha'] != $_SESSION['captcha']){
        $msg = "Wrong CAPTCHA";
    } else {
        $email = $_POST['email'];
        $res = $conn->query("SELECT * FROM admins WHERE email='$email'");
        if($res->num_rows){
            $row = $res->fetch_assoc();
            if(password_verify($_POST['password'],$row['password'])){
                $_SESSION['admin_id']=$row['id'];
                header("Location: ../admin/dashboard.php");
            } else $msg="Invalid login";
        } else $msg="Invalid login";
    }
}
?>

<form method="post">
<h2>Admin Login</h2>
<input type="email" name="email" required><br>
<input type="password" name="password" required><br>
CAPTCHA: <?php include "captcha.php"; ?><br>
<input type="text" name="captcha"><br>
<button name="login">Login</button>
<p><?= $msg ?? "" ?></p>
</form>